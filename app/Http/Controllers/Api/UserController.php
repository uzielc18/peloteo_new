<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return UserCollection
     */
    public function index(Request $request)
    {
        $q=$request->q;
        $data=User::when($q, function ($query,string $q) {
                return $query->where('name', 'LIKE', '%'.$q.'%')
                    ->orWhere('email', 'LIKE', '%'.$q.'%');

            })
            ->get();
        return new UserCollection($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userSinSocio(Request $request)
    {
        $q=$request->q;
        $data=User::leftJoin('socios','users.id','=','socios.user_id')
            ->when($q, function ($query,string $q) {
            return $query->where('users.name', 'LIKE', '%'.$q.'%');
               // ->orWhere('users.email', 'LIKE', '%'.$q.'%')->whereNull('socios.user_id');

        })
            ->whereNull('socios.user_id')
            ->select('users.*','socios.dni','socios.user_id')
            ->get();
            return response()->json([
                'success' => true,
                'data'=>$data,
                'meta' => null,
                'errors' => null
            ], 200);
        //return new UserCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $user = User::create($requestData);
        return (new UserResource($user))->setMessage('Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return UserResource
     */
    public function update(Request $request, User $user)
    {
        $requestData = $request->all();
        $user->update($requestData);
        return (new UserResource($user))->setMessage('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted!',
            'meta' => null,
            'errors' => null
        ], 200);
    }
}
