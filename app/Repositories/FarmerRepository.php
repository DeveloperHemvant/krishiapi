<?php

namespace App\Repositories;

use App\Models\Farmer;
use Illuminate\Support\Facades\Hash;

class FarmerRepository implements FarmerRepositoryInterface
{
    public function register(array $data): Farmer
    {
        $data['password'] = Hash::make($data['password']);
        return Farmer::create($data);
    }

    public function findByEmail(string $email): ?Farmer
    {
        return Farmer::where('email', $email)->first();
    }
}
