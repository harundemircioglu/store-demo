<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Base\Http\Controllers\ApiBaseController;
use Modules\Category\Http\Requests\StoreCategoryFeatureRequest;
use Modules\Category\Http\Requests\UpdateCategoryFeatureRequest;
use Modules\Category\Interfaces\CategoryFeatureInterface;

class ApiCategoryFeatureController extends ApiBaseController
{
    protected $categoryFeatureRepository;

    public function __construct(CategoryFeatureInterface $categoryFeatureRepository)
    {
        parent::__construct($categoryFeatureRepository);

        $this->categoryFeatureRepository = $categoryFeatureRepository;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new StoreCategoryFeatureRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $data['slug'] = makeSlug($data['name']);

            if (isset($data['image'])) {
                $data['image'] = uploadFile($data['image']);
            }

            if (isset($data['icon'])) {
                $data['icon'] = uploadFile($data['icon']);
            }

            $categoryFeature = $this->categoryFeatureRepository->store($data);

            return response()->json([
                'message' => 'Category feature created successfully',
                'data' => $categoryFeature,
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), (new UpdateCategoryFeatureRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $data['slug'] = makeSlug($data['name']);

            if (isset($data['image'])) {
                $data['image'] = uploadFile($data['image']);
            }

            if (isset($data['icon'])) {
                $data['icon'] = uploadFile($data['icon']);
            }

            $categoryFeature = $this->categoryFeatureRepository->update($data, $id);

            return response()->json([
                'message' => 'Category feature updated successfully',
                'data' => $categoryFeature,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
