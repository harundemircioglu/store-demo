<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Repositories\ProductRespository;
use Modules\Store\Http\Requests\StoreProductRequest;

class ApiProductController extends ApiBaseController
{
    protected $productRepository;

    public function __construct(ProductRespository $productRepository)
    {
        parent::__construct($productRepository);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $this->productRepository->store($data);

        return response()->json([
            'message' => 'Product created successfully',
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id) {
        $data = $request->validated();

        $this->productRepository->update($data,$id);

        return response()->json([
            'message' => 'Product updated successfully',
        ], 200);
    }
}
