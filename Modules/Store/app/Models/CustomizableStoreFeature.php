<?php

namespace Modules\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Log\Traits\Loggable;

class CustomizableStoreFeature extends Model
{
    use Loggable;

    protected $guarded = ['id'];

    // store_type => 1 = individual, 2 = corporate, 3 = both

    // type => 1 = text, 2 = textarea, 3 = select, 4 = checkbox, 5 = radio, 6 = file, 7 = date, 8 = time, 9 = datetime
}
