<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 1, // Указываем роль администратора
        ]);

        User::create([
            'login' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 2, // Обычный пользователь
        ]);
    }
}
