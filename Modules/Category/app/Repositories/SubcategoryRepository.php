<?php

namespace Modules\Category\Repositories;

use Modules\Base\Repositories\BaseRepository;
use Modules\Category\Interfaces\SubcategoryInterface;
use Modules\Category\Models\Subcategory;

class SubcategoryRepository extends BaseRepository implements SubcategoryInterface
{
    public function __construct(Subcategory $model)
    {
        parent::__construct($model);
    }
}
