<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Log\Traits\Loggable;

class CategoryFeature extends Model
{
    use Loggable;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
