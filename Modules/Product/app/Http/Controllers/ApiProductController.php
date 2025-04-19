<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Interfaces\ProductInterface;
use Modules\Store\Http\Requests\StoreProductRequest;

class ApiProductController extends ApiBaseController
{
    protected ProductInterface $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        parent::__construct($productRepository);
        $this->productRepository = $productRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->store($request->validated());

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id) {
        $product = $this->productRepository->update($request->validated(), $id);

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product,
        ]);
    }
}
