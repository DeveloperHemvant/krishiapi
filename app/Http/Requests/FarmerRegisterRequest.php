<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmerRegisterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female,other',
            'age' => 'required|integer|min:18',
            'phone' => 'required|string|max:15|unique:farmers,phone',
            'email' => 'required|email|unique:farmers,email',
            'password' => 'required|string|min:6|confirmed',
            'aadhaar_no' => 'nullable|string|max:12',
            'preferred_language' => 'nullable|string|max:50',
            'state_id' => 'nullable|integer',
            'district_id' => 'nullable|integer',
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
    }
}
