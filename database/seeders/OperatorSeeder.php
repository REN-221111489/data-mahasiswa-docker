<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class OperatorSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'operator@mikroskil.ac.id',
            ],
            [
                'username' => 'operator',
                'password' => Hash::make('operator123'),
                'role' => 'operator',
            ]
        );
    }
}
