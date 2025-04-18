<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Base\Interfaces\BaseInterface;

class ApiBaseController extends Controller
{
    protected BaseInterface $baseRepository;

    public function __construct(BaseInterface $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->baseRepository->getAll());
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return response()->json($this->baseRepository->find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->baseRepository->destroy($id);

        return response()->json([
            'message' => 'Deleted successfully.'
        ]);
    }
}
