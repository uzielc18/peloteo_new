<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Http\Resources\ProvinciaResource;
use App\Http\Resources\ProvinciaCollection;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ProvinciaCollection
     */
    public function index(Request $request)
    {
        return new ProvinciaCollection(Provincia::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ProvinciaResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $provincia = Provincia::create($requestData);
        return (new ProvinciaResource($provincia))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Provincia $provincia
     * @return ProvinciaResource
     */
    public function show(Provincia $provincia)
    {
        return new ProvinciaResource($provincia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Provincia $provincia
     * @return ProvinciaResource
     */
    public function update(Request $request, Provincia $provincia)
    {
        $requestData = $request->all();
        $provincia->update($requestData);
        return (new ProvinciaResource($provincia))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Provincia $provincia
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Provincia $provincia)
    {
        $provincia->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
