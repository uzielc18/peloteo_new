<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Jugadore;
use App\Http\Resources\JugadoreResource;
use App\Http\Resources\JugadoreCollection;

class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JugadoreCollection
     */
    public function index(Request $request)
    {
        return new JugadoreCollection(Jugadore::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JugadoreResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $jugadore = Jugadore::create($requestData);
        return (new JugadoreResource($jugadore))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Jugadore $jugadore
     * @return JugadoreResource
     */
    public function show(Jugadore $jugadore)
    {
        return new JugadoreResource($jugadore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Jugadore $jugadore
     * @return JugadoreResource
     */
    public function update(Request $request, Jugadore $jugadore)
    {
        $requestData = $request->all();
        $jugadore->update($requestData);
        return (new JugadoreResource($jugadore))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Jugadore $jugadore
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Jugadore $jugadore)
    {
        $jugadore->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
