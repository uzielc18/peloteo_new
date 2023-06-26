<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Imagene;
use App\Http\Resources\ImageneResource;
use App\Http\Resources\ImageneCollection;

class ImageneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ImageneCollection
     */
    public function index(Request $request)
    {
        return new ImageneCollection(Imagene::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ImageneResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $imagene = Imagene::create($requestData);
        return (new ImageneResource($imagene))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param Imagene $imagene
     * @return ImageneResource
     */
    public function show(Imagene $imagene)
    {
        return new ImageneResource($imagene);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Imagene $imagene
     * @return ImageneResource
     */
    public function update(Request $request, Imagene $imagene)
    {
        $requestData = $request->all();
        $imagene->update($requestData);
        return (new ImageneResource($imagene))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Imagene $imagene
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Imagene $imagene)
    {
        $imagene->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
