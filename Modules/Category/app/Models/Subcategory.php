<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded = ['id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function features()
    {
        return $this->hasMany(CategoryFeature::class, 'subcategory_id', 'id');
    }
}
