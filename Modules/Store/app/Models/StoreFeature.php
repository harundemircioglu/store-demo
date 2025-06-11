<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Log\Traits\Loggable;

class StoreFeature extends Model
{
    use Loggable;

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
