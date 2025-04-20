<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Interfaces\BaseInterface;

class ApiBaseController extends Controller
{
    protected $baseRepository;

    public function __construct(BaseInterface $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = $this->baseRepository->getAll();
            return response()->json([
                'message' => "Data retrieved successfully.",
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Failed to retrieve data. Please try again later.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $record = $this->baseRepository->store($data);
            return response()->json([
                'message' => "Resource created successfully.",
                'record' => $record,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Failed to create resource. Please check the input and try again.",
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        try {
            $record = $this->baseRepository->find($id);
            if (!$record) {
                return response()->json([
                    'message' => "Resource not found.",
                ], 404);
            }
            return response()->json([
                'message' => "Resource retrieved successfully.",
                'record' => $record,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Failed to retrieve resource. Please try again later.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $record = $this->baseRepository->update($data, $id);
            if (!$record) {
                return response()->json([
                    'message' => "Resource not found or update failed.",
                ], 404);
            }
            return response()->json([
                'message' => "Resource updated successfully.",
                'record' => $record,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Failed to update resource. Please check the input and try again.",
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $result = $this->baseRepository->destroy($id);
            if (!$result) {
                return response()->json([
                    'message' => "Resource not found or delete failed.",
                ], 404);
            }
            return response()->json([
                'message' => "Resource deleted successfully.",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Failed to delete resource. Please try again later.",
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
