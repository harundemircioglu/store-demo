<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Repositories\BaseRepository;
use Modules\Product\Interfaces\ProductInterface;
use Modules\Product\Models\Product;

class ProductRespository extends BaseRepository implements ProductInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
