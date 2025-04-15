<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Log\Traits\Loggable;

class Product extends Model
{
    use Loggable;

    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];
}
