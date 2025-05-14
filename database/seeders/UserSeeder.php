<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test Admin',
            'email' => 'test_admin@email.com',
            'password' => Hash::make('pass1234'),
            'role' => 'admin',
            'image' => 'default.png'
        ]);
        User::create([
            'name' => 'Test User',
            'email' => 'test_user@email.com',
            'password' => Hash::make('pass1234'),
            'role' => 'customer',
            'image' => 'default.png'
        ]);
    }
}
