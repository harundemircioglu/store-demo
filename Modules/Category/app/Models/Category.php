<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Log\Traits\Loggable;

class Category extends Model
{
    use Loggable;

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
