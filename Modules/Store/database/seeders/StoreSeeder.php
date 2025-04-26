<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;
use Modules\Store\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','store@gmail.com')->first();

        if ($user) {
            Store::firstOrCreate(['user_id' => $user->id], [
                'store_name' => 'Store Name',
                'store_slug' => makeSlug('Store Name'),
            ]);
        }
    }
}
