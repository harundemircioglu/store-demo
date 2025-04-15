<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Base\Repositories\BaseRepository;

class ApiBaseController extends Controller
{
    protected $baseRepository;

    public function __construct(BaseRepository $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->baseRepository->getAll();

        return response()->json([
            'message' => 'All records retrieved successfully',
        ], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $this->baseRepository->find($id);

        return response()->json([
            'message' => 'Record retrieved successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->baseRepository->destroy($id);

        return response()->json([
            'message' => 'Record deleted successfully',
        ], 200);
    }
}
