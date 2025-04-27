<?php

namespace Modules\Category\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Category\Interfaces\CategoryFeatureInterface;
use Modules\Category\Models\CategoryFeature;

class CategoryFeatureRepository extends BaseRepository implements CategoryFeatureInterface
{
    public function __construct(CategoryFeature $model)
    {
        parent::__construct($model);
    }
}
