<?php

namespace Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Store\Http\Requests\StoreStoreRequest;
use Modules\Store\Repositories\StoreRepository;

class ApiStoreController extends Controller
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('store::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        $data = $request->validated();

        $this->storeRepository->store($data);

        return response()->json([
            'message' => 'Store created successfully',
        ], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('store::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('store::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
