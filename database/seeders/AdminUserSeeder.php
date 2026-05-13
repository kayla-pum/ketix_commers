<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // ← Tambahkan ini! Import model User
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek dan buat admin{
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@ketix.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]);
            echo "Admin baru berhasil dibuat!\n";
            //verifikasi
            $admin = User::where('email', 'admin@ketix.com')->first();
            echo "Role: ". $admin->role . "\n";
            exit;
        
        // Cek dan buat user biasa
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