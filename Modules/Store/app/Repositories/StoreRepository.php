<?php

namespace Modules\Store\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Store\Interfaces\StoreInterface;
use Modules\Store\Models\Store;

class StoreRepository extends BaseRepository implements StoreInterface
{
    public function __construct(Store $model)
    {
        parent::__construct($model);
    }
}
