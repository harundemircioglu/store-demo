<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Category\Http\Requests\StoreCategoryRequest;
use Modules\Category\Http\Requests\UpdateCategoryRequest;
use Modules\Category\Interfaces\CategoryInterface;

class ApiCategoryController extends ApiBaseController
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository,)
    {
        parent::__construct($categoryRepository);

        $this->categoryRepository = $categoryRepository;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new StoreCategoryRequest())->rules());

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

        $category = $this->categoryRepository->store($data);

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), (new UpdateCategoryRequest())->rules());

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

        $category = $this->categoryRepository->update($data, $id);

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category,
        ], 200);
    }
}
