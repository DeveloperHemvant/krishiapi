<?php

namespace App\Repositories;

use App\Models\Farmer;

interface FarmerRepositoryInterface
{
    public function register(array $data): Farmer;
    public function findByEmail(string $email): ?Farmer;
}
