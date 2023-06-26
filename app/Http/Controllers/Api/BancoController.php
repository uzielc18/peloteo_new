<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Banco;
use App\Http\Resources\BancoResource;
use App\Http\Resources\BancoCollection;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BancoCollection
     */
    public function index(Request $request)
    {
        return new BancoCollection(Banco::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return BancoResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $banco = Banco::create($requestData);
        return (new BancoResource($banco))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Banco $banco
     * @return BancoResource
     */
    public function show(Banco $banco)
    {
        return new BancoResource($banco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Banco $banco
     * @return BancoResource
     */
    public function update(Request $request, Banco $banco)
    {
        $requestData = $request->all();
        $banco->update($requestData);
        return (new BancoResource($banco))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Banco $banco
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Banco $banco)
    {
        $banco->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
