<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Farmer extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'gender',
        'age',
        'phone',
        'email',
        'password',
        'aadhaar_no',
        'preferred_language',
        'state_id',
        'district_id',
        'village',
        'land_size',
        'land_type',
        'soil_types',
        'water_source',
        'livestock',
        'bank_name',
        'account_number',
        'ifsc_code',
        'consent',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'soil_types' => 'array',
        'livestock' => 'array',
        'consent' => 'boolean',
        'age' => 'integer',
    ];

    // Automatically hash password if set
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
        }
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    // public function district()
    // {
    //     return $this->belongsTo(District::class, 'district_id');
    // }
}
