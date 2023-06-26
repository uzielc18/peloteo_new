<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\PagosSocio;
use App\Http\Resources\PagosSocioResource;
use App\Http\Resources\PagosSocioCollection;

class PagosSocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return PagosSocioCollection
     */
    public function index(Request $request)
    {
        return new PagosSocioCollection(PagosSocio::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PagosSocioResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $pagosSocio = PagosSocio::create($requestData);
        return (new PagosSocioResource($pagosSocio))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param PagosSocio $pagosSocio
     * @return PagosSocioResource
     */
    public function show(PagosSocio $pagosSocio)
    {
        return new PagosSocioResource($pagosSocio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PagosSocio $pagosSocio
     * @return PagosSocioResource
     */
    public function update(Request $request, PagosSocio $pagosSocio)
    {
        $requestData = $request->all();
        $pagosSocio->update($requestData);
        return (new PagosSocioResource($pagosSocio))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PagosSocio $pagosSocio
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(PagosSocio $pagosSocio)
    {
        $pagosSocio->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
