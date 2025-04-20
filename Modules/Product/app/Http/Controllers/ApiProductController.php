<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\Interfaces\ProductInterface;
use Modules\Product\Repositories\ProductRepository;
use Modules\Store\Http\Requests\StoreProductRequest;

class ApiProductController extends ApiBaseController
{
    protected ProductInterface $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        parent::__construct($productRepository);
        $this->productRepository = $productRepository;
    }

    public function store(Request $request)
    {
        $data = $request->validate((new StoreProductRequest())->rules());

        $data['user_id'] = auth()->id();

        $data['slug'] = makeSlug($data['title']);

        return response()->json([
            'message' => "Product creted successful",
            'record' => $this->productRepository->store($data),
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate((new UpdateProductRequest())->rules());

        $data['user_id'] = auth()->id();

        $data['slug'] = makeSlug($data['title']);

        return response()->json([
            'message' => "Product updated successful",
            'record' => $this->productRepository->update($data, $id),
        ], 200);
    }
}
