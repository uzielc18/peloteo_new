<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Socio;
use App\Http\Resources\SocioResource;
use App\Http\Resources\SocioCollection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return SocioCollection
     */
    public function index(Request $request)
    {
        $q=$request->q;
        $data=Socio::where('estado',1)
        ->when($q, function (Builder $query,string $q) {
            return $query->where('razon_social', 'LIKE', '%'.$q.'%')
            ->orWhere('ruc', 'LIKE', '%'.$q.'%')
            ->orWhere('dni', 'LIKE', '%'.$q.'%');

        })
        ->get();
        return new SocioCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return SocioResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $socio = Socio::create($requestData);
        return (new SocioResource($socio))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Socio $socio
     * @return SocioResource
     */
    public function show(Socio $socio)
    {
        return new SocioResource($socio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Socio $socio
     * @return SocioResource
     */
    public function update(Request $request, Socio $socio)
    {
        $requestData = $request->all();
        $socio->update($requestData);
        return (new SocioResource($socio))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Socio $socio
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Socio $socio)
    {
        $socio->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
