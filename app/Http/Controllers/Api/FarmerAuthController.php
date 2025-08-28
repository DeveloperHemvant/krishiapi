<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

class FarmerAuthController extends Controller
{
    public function register(Request $request)
    {
        // 1️⃣ Set locale based on request or default
        $locale = $request->preferred_language ?? config('app.locale', 'en');
        App::setLocale($locale);

        try {
            // 2️⃣ Validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'age' => 'required|integer|min:18',
                'phone' => 'required|string|max:15|unique:farmers,phone',
                'email' => 'required|email|unique:farmers,email',
                'password' => 'required|string|min:6|confirmed',
                'aadhaar_no' => 'nullable|string|max:12',
                'preferred_language' => 'nullable|string|in:en,hi',
                'state_id' => 'nullable|integer',
                'village' => 'nullable|string|max:255',
                'land_size' => 'nullable|string|max:255',
                'land_type' => 'nullable|string|max:255',
                'soil_types' => 'nullable|array',
                'water_source' => 'nullable|string|max:255',
                'livestock' => 'nullable|array',
                'bank_name' => 'nullable|string|max:255',
                'account_number' => 'nullable|string|max:30',
                'ifsc_code' => 'nullable|string|max:20',
                'consent' => 'required|boolean',
            ];

            // 3️⃣ Custom messages
            $messages = [
                'name.required' => __('validation.name_required'),
                'email.required' => __('validation.email_required'),
                'email.email' => __('validation.email_invalid'),
                'email.unique' => __('validation.email_unique'),
                'phone.required' => __('validation.phone_required'),
                'phone.unique' => __('validation.phone_unique'),
                'password.required' => __('validation.password_required'),
                'password.min' => __('validation.password_min'),
                'password.confirmed' => __('validation.password_confirmed'),
                'age.min' => __('validation.age_min'),
                'gender.in' => __('validation.gender_invalid'),
                'consent.required' => __('validation.consent_required'),
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                Log::warning('Farmer registration validation failed', $validator->errors()->toArray());

                return response()->json([
                    'status' => false,
                    'message' => __('validation.fix_errors'),
                    'errors' => $validator->errors()
                ], 422);
            }

            // 4️⃣ Create Farmer
            $data = $validator->validated();
            $data['password'] = Hash::make($data['password']);

            $farmer = Farmer::create($data);
            Log::info('Farmer registered successfully', ['id' => $farmer->id, 'email' => $farmer->email]);

            // 5️⃣ Generate token
            $token = $farmer->createToken('FarmerToken')->accessToken;

            // 6️⃣ Return response
            return response()->json([
                'status' => true,
                'message' => __('messages.registered'),
                'token' => $token,
                'farmer' => $farmer
            ]);

        } catch (\Exception $e) {
            Log::error('Farmer registration error', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return response()->json([
                'status' => false,
                'message' => __('messages.registration_error'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Farmer Login
    public function login(FarmerLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::guard('farmer')->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $farmer = Auth::guard('farmer')->user();
        $token = $farmer->createToken('FarmerToken')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'farmer' => $farmer
        ]);
    }

    // Farmer Logout
    public function logout()
    {
        Auth::guard('farmer')->user()->token()->revoke();
        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }
}
