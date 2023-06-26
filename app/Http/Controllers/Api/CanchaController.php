<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Cancha;
use App\Http\Resources\CanchaResource;
use App\Http\Resources\CanchaCollection;

class CanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return CanchaCollection
     */
    public function index(Request $request)
    {
        return new CanchaCollection(Cancha::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return CanchaResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $cancha = Cancha::create($requestData);
        return (new CanchaResource($cancha))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Cancha $cancha
     * @return CanchaResource
     */
    public function show(Cancha $cancha)
    {
        return new CanchaResource($cancha);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cancha $cancha
     * @return CanchaResource
     */
    public function update(Request $request, Cancha $cancha)
    {
        $requestData = $request->all();
        $cancha->update($requestData);
        return (new CanchaResource($cancha))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cancha $cancha
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Cancha $cancha)
    {
        $cancha->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
