<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Product\Repositories\ProductRepository;

class ApiProductController extends ApiBaseController
{
    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct($productRepository);
    }
}
