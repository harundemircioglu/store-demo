<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Log\Traits\Loggable;

class Subcategory extends Model
{
    use Loggable;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function features()
    {
        return $this->hasMany(CategoryFeature::class, 'subcategory_id', 'id');
    }
}
