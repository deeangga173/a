<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()
        ->get();
      
        $collection = UserResource::collection($data);

        return $collection->additional([
            "status" => true,
            "message"=> "sukses"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->number_phone = $request->number_phone;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->profile_photo = $request->profile_photo;
        $user->profession = $request->profession;
        $user->summary = $request->summary;
        $user->earning= $request->earning;
        $user->portofolio_attachment= $request->portofolio_attachment;
        $user->role = $request->role;
        $user->save();


        return response()->json(
            ["data"=> $user]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::query()
        ->where('id', "=", $id)
        ->first();

        $resource =  new UserResource($data);

        return $resource->additional([
            "status" => true,
            "message" => "Success"
        ])->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::query()
        ->where('id',"=",$id)
        ->first();

        $payload=$request->validated();

        $data = $user->update($payload);

        return response()->json(
            ["data"=>$user]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user ) {
            return response()->json(['message' => 'User is not found'], 404);
        }
    
        $user ->delete();
    
        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
