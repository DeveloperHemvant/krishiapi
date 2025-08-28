<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmerRegisterRequest;
use App\Http\Requests\FarmerLoginRequest;
use App\Repositories\FarmerRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class FarmerAuthController extends Controller
{
    protected $farmerRepo;

    public function __construct(FarmerRepositoryInterface $farmerRepo)
    {
        $this->farmerRepo = $farmerRepo;
    }

    // Farmer Register
    public function register(FarmerRegisterRequest $request)
    {
        $farmer = $this->farmerRepo->register($request->validated());

        $token = $farmer->createToken('FarmerToken')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Farmer registered successfully',
            'token' => $token,
            'farmer' => $farmer
        ]);
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
