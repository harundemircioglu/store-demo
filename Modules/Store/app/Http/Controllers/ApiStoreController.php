<?php

namespace Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Store\Interfaces\StoreInterface;

class ApiStoreController extends ApiBaseController
{
    public function __construct(StoreInterface $storeRepository)
    {
        parent::__construct($storeRepository);
    }
}
