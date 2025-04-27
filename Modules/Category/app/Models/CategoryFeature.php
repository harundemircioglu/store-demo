<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    protected $guarded = ['id', 'category_id', 'subcategory_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
