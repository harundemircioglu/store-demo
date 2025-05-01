<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;

class CustomizableStoreFeature extends Model
{
    // store_type => 1 = individual, 2 = corporate, 3 = both

    // type => 1 = text, 2 = textarea, 3 = select, 4 = checkbox, 5 = radio, 6 = file, 7 = date, 8 = time, 9 = datetime

    protected $guarded = ['id'];
}
