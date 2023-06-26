<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Paise;
use App\Http\Resources\PaiseResource;
use App\Http\Resources\PaiseCollection;

class PaiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return PaiseCollection
     */
    public function index(Request $request)
    {
        return new PaiseCollection(Paise::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PaiseResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $paise = Paise::create($requestData);
        return (new PaiseResource($paise))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Paise $paise
     * @return PaiseResource
     */
    public function show(Paise $paise)
    {
        return new PaiseResource($paise);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Paise $paise
     * @return PaiseResource
     */
    public function update(Request $request, Paise $paise)
    {
        $requestData = $request->all();
        $paise->update($requestData);
        return (new PaiseResource($paise))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Paise $paise
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Paise $paise)
    {
        $paise->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
