<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ReservasUsuario;
use App\Http\Resources\ReservasUsuarioResource;
use App\Http\Resources\ReservasUsuarioCollection;

class ReservasUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ReservasUsuarioCollection
     */
    public function index(Request $request)
    {
        return new ReservasUsuarioCollection(ReservasUsuario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ReservasUsuarioResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $reservasUsuario = ReservasUsuario::create($requestData);
        return (new ReservasUsuarioResource($reservasUsuario))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param ReservasUsuario $reservasUsuario
     * @return ReservasUsuarioResource
     */
    public function show(ReservasUsuario $reservasUsuario)
    {
        return new ReservasUsuarioResource($reservasUsuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ReservasUsuario $reservasUsuario
     * @return ReservasUsuarioResource
     */
    public function update(Request $request, ReservasUsuario $reservasUsuario)
    {
        $requestData = $request->all();
        $reservasUsuario->update($requestData);
        return (new ReservasUsuarioResource($reservasUsuario))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ReservasUsuario $reservasUsuario
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(ReservasUsuario $reservasUsuario)
    {
        $reservasUsuario->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
