<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function features()
    {
        return $this->hasMany(CategoryFeature::class, 'category_id', 'id');
    }
}
