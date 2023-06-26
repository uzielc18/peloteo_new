<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Http\Resources\HorarioResource;
use App\Http\Resources\HorarioCollection;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return HorarioCollection
     */
    public function index(Request $request)
    {
        return new HorarioCollection(Horario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return HorarioResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $horario = Horario::create($requestData);
        return (new HorarioResource($horario))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Horario $horario
     * @return HorarioResource
     */
    public function show(Horario $horario)
    {
        return new HorarioResource($horario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Horario $horario
     * @return HorarioResource
     */
    public function update(Request $request, Horario $horario)
    {
        $requestData = $request->all();
        $horario->update($requestData);
        return (new HorarioResource($horario))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Horario $horario
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
