<?php

namespace Modules\Log\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Log\Database\Factories\LogFactory;

class Log extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = [];

    protected $guarded = [];

    // protected static function newFactory(): LogFactory
    // {
    //     // return LogFactory::new();
    // }
}
