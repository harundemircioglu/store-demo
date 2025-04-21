<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Models\User;
use Modules\Log\Traits\Loggable;

class Store extends Model
{
    use Loggable;

    // store_type => 1 = individual, 2 = corporate

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function storeFeatures()
    {
        return $this->hasMany(CustomizableStoreFeature::class, 'customizable_store_features_id', 'id');
    }
}
