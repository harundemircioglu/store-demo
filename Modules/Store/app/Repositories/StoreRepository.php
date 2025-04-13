<?php

namespace Modules\Store\Repositories;

use Modules\Auth\Models\User;
use Modules\Store\Interfaces\StoreInterface;
use Modules\Store\Models\Store;

class StoreRepository implements StoreInterface
{
    public function store($data)
    {
        $user = new User();
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role = 3;
        $user->assignRole('user');
        $user->save();

        $store = new Store();
        $store->user_id = $user->id;
        $store->store_name = $data['store_name'];
        $store->store_slug = makeSlug($data['store_name']);
        $store->store_logo = uploadFile($data['store_logo']);
        $store->store_banner = uploadFile($data['store_banner']);
        $store->save();

        // ! add send account verification email
    }
}
