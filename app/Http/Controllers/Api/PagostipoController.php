<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Pagostipo;
use App\Http\Resources\PagostipoResource;
use App\Http\Resources\PagostipoCollection;

class PagostipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return PagostipoCollection
     */
    public function index(Request $request)
    {
        return new PagostipoCollection(Pagostipo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PagostipoResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $pagostipo = Pagostipo::create($requestData);
        return (new PagostipoResource($pagostipo))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Pagostipo $pagostipo
     * @return PagostipoResource
     */
    public function show(Pagostipo $pagostipo)
    {
        return new PagostipoResource($pagostipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Pagostipo $pagostipo
     * @return PagostipoResource
     */
    public function update(Request $request, Pagostipo $pagostipo)
    {
        $requestData = $request->all();
        $pagostipo->update($requestData);
        return (new PagostipoResource($pagostipo))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pagostipo $pagostipo
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Pagostipo $pagostipo)
    {
        $pagostipo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
