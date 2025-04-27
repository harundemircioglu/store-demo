<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Category\Http\Requests\StoreSubcategoryRequest;
use Modules\Category\Http\Requests\UpdateSubcategoryRequest;
use Modules\Category\Interfaces\SubcategoryInterface;

class ApiSubcategoryController extends ApiBaseController
{
    protected $subcategoryRepository;

    public function __construct(SubcategoryInterface $subcategoryRepository)
    {
        parent::__construct($subcategoryRepository);

        $this->subcategoryRepository = $subcategoryRepository;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new StoreSubcategoryRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        $data['slug'] = makeSlug($data['name']);

        if (isset($data['image'])) {
            $data['image'] = uploadFile($data['image']);
        }

        if (isset($data['icon'])) {
            $data['icon'] = uploadFile($data['icon']);
        }

        $subcategory = $this->subcategoryRepository->store($data);

        return response()->json([
            'message' => 'Subcategory created successfully',
            'data' => $subcategory,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), (new UpdateSubcategoryRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        $data['slug'] = makeSlug($data['name']);

        if (isset($data['image'])) {
            $data['image'] = uploadFile($data['image']);
        }

        if (isset($data['icon'])) {
            $data['icon'] = uploadFile($data['icon']);
        }

        $subcategory = $this->subcategoryRepository->update($data, $id);

        return response()->json([
            'message' => 'Subcategory updated successfully',
            'data' => $subcategory,
        ], 200);
    }
}
