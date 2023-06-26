<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Http\Resources\DepartamentoResource;
use App\Http\Resources\DepartamentoCollection;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return DepartamentoCollection
     */
    public function index(Request $request)
    {
        return new DepartamentoCollection(Departamento::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return DepartamentoResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $departamento = Departamento::create($requestData);
        return (new DepartamentoResource($departamento))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Departamento $departamento
     * @return DepartamentoResource
     */
    public function show(Departamento $departamento)
    {
        return new DepartamentoResource($departamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Departamento $departamento
     * @return DepartamentoResource
     */
    public function update(Request $request, Departamento $departamento)
    {
        $requestData = $request->all();
        $departamento->update($requestData);
        return (new DepartamentoResource($departamento))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Departamento $departamento
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
