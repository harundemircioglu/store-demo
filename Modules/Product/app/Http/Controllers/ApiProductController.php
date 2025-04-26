<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Product\Http\Requests\StoreProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Interfaces\ProductInterface;

class ApiProductController extends ApiBaseController
{
    protected ProductInterface $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        parent::__construct($productRepository);
        $this->productRepository = $productRepository;
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new StoreProductRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = makeSlug($data['title']);

        try {
            $product = $this->productRepository->store($data);
            return response()->json([
                'message' => 'Product created successfully',
                'record' => $product,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the product',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified product.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), (new UpdateProductRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = makeSlug($data['title']);

        try {
            $product = $this->productRepository->update($data, $id);
            if ($product) {
                return response()->json([
                    'message' => 'Product updated successfully',
                    'record' => $product,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Product not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the product',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
