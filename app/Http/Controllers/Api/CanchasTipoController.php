<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\CanchasTipo;
use App\Http\Resources\CanchasTipoResource;
use App\Http\Resources\CanchasTipoCollection;

class CanchasTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return CanchasTipoCollection
     */
    public function index(Request $request)
    {
        return new CanchasTipoCollection(CanchasTipo::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return CanchasTipoCollection
     */
    public function misCanchas(Request $request)
    {
        return new CanchasTipoCollection(CanchasTipo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return CanchasTipoResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $canchasTipo = CanchasTipo::create($requestData);
        return (new CanchasTipoResource($canchasTipo))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param CanchasTipo $canchasTipo
     * @return CanchasTipoResource
     */
    public function show(CanchasTipo $canchasTipo)
    {
        return new CanchasTipoResource($canchasTipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CanchasTipo $canchasTipo
     * @return CanchasTipoResource
     */
    public function update(Request $request, CanchasTipo $canchasTipo)
    {
        $requestData = $request->all();
        $canchasTipo->update($requestData);
        return (new CanchasTipoResource($canchasTipo))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CanchasTipo $canchasTipo
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(CanchasTipo $canchasTipo)
    {
        $canchasTipo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
