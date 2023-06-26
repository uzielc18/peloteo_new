<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Distrito;
use App\Http\Resources\DistritoResource;
use App\Http\Resources\DistritoCollection;

class DistritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return DistritoCollection
     */
    public function index(Request $request)
    {
        return new DistritoCollection(Distrito::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return DistritoResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $distrito = Distrito::create($requestData);
        return (new DistritoResource($distrito))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Distrito $distrito
     * @return DistritoResource
     */
    public function show(Distrito $distrito)
    {
        return new DistritoResource($distrito);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Distrito $distrito
     * @return DistritoResource
     */
    public function update(Request $request, Distrito $distrito)
    {
        $requestData = $request->all();
        $distrito->update($requestData);
        return (new DistritoResource($distrito))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Distrito $distrito
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Distrito $distrito)
    {
        $distrito->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
