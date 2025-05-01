<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;

class StoreFeature extends Model
{
    protected $guarded = ['id'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function feature()
    {
        return $this->belongsTo(CustomizableStoreFeature::class, 'customizable_store_features_id', 'id');
    }
}
