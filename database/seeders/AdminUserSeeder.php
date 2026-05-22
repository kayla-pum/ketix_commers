<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin
        if(!User::where('email', 'admin@ketix.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@ketix.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]);
            $this->command->info('Admin user created successfully!');
        } else {
            $this->command->info('Admin user already exists!');
        }
        
        // Buat user biasa
        if(!User::where('email', 'user@ketix.com')->exists()) {
            User::create([
                'name' => 'User Biasa',
                'email' => 'user@ketix.com',
                'password' => Hash::make('user123'),
                'role' => 'user'
            ]);
            $this->command->info('Regular user created successfully!');
        } else {
            $this->command->info('Regular user already exists!');
        }
    }
}