<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'datnt21012001@gmail.com',
            'name' => 'datnt',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
    }
}
