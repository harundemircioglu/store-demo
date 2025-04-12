<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Store\Database\Factories\StoreFactory;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    protected $guarded = [];

    // protected $fillable = [];

    // protected static function newFactory(): StoreFactory
    // {
    //     // return StoreFactory::new();
    // }
}
