<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Models\User;

class Store extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
