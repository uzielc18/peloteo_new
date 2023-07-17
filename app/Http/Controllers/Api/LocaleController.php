<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Locale;
use App\Http\Resources\LocaleResource;
use App\Http\Resources\LocaleCollection;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return LocaleCollection
     */
    public function index(Request $request)
    {
        $socio_id=$request->socio_id;
        $q=$request->q;
        Locale::where('estado',1)
        ->when($socio_id,function ($query, $socio_id) {
            return $query->where('socio_id',$socio_id);
        })
        ->when($q, function ($query,$q) {
            return $query->where('razon_social', 'LIKE', '%'.$q.'%')
            ->orWhere('ruc', 'LIKE', '%'.$q.'%')
            ->orWhere('dni', 'LIKE', '%'.$q.'%');
        })
        ->get();
        return new LocaleCollection(Locale::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return LocaleResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $locale = Locale::create($requestData);
        return (new LocaleResource($locale))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Locale $locale
     * @return LocaleResource
     */
    public function show(Locale $locale)
    {
        return new LocaleResource($locale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Locale $locale
     * @return LocaleResource
     */
    public function update(Request $request, Locale $locale)
    {
        $requestData = $request->all();
        $locale->update($requestData);
        return (new LocaleResource($locale))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Locale $locale
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Locale $locale)
    {
        $locale->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
