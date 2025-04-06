<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(['email' => 'superadmin@gmail.com'], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 1,
        ])->assignRole('super-admin');

        User::firstOrCreate(['email' => 'admin@gmail.com'], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 2,
        ])->assignRole('admin');

        User::firstOrCreate(['email' => 'user@gmail.com'], [
            'name' => 'User',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role' => 3,
        ])->assignRole('user');
    }
}
