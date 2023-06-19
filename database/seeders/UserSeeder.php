<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat data dummy untuk admin dan user
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@campusconnect.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No. 123',
            'avatar' => 'default.png',
        ];

        $user = [
            'name' => 'User',
            'email' => 'user@campusconnect.com',
            'password' => bcrypt('user'),
            'role' => 'user',
            'status' => 'active',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No. 123',
            'avatar' => 'default.png',
        ];

        // Insert data dummy ke dalam table users
        \App\Models\User::create($admin);
        \App\Models\User::create($user);
    }
}
