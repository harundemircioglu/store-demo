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
        return response()->json([
            'message' => "",
            'data' => $this->baseRepository->getAll(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'message' => "",
            'record' => $this->baseRepository->store($request->all()),
        ], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return response()->json([
            'message' => "",
            'record' => $this->baseRepository->find($id),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json([
            'message' => "",
            'record' => $this->baseRepository->update($request->all(), $id),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json([
            'message' => "",
            'record' => $this->baseRepository->destroy($id),
        ], 200);
    }
}
