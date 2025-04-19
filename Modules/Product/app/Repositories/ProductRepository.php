<?php

namespace Modules\Product\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Product\Interfaces\ProductInterface;
use Modules\Product\Models\Product;

class ProductRepository extends BaseRepository implements ProductInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
