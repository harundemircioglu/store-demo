<?php

namespace Modules\Category\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Category\Interfaces\CategoryInterface;
use Modules\Category\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
