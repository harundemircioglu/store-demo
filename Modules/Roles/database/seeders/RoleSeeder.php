<?php

namespace Modules\Roles\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'super-admin'], [
            'guard_name' => 'api',
            'title' => 'Super Admin',
            'description' => 'Has access to all features and settings.',
        ]);

        Role::firstOrCreate(['name' => 'admin'], [
            'guard_name' => 'api',
            'title' => 'Admin',
            'description' => 'Has access to most features and settings.',
        ]);

        Role::firstOrCreate(['name' => 'user'], [
            'guard_name' => 'api',
            'title' => 'User',
            'description' => 'Has access to basic features.',
        ]);

        Role::firstOrCreate(['name' => 'store'], [
            'guard_name' => 'api',
            'title' => 'Store',
            'description' => 'Has limited access to features.',
        ]);
    }
}
