<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserExperiencesRequest;
use App\Http\Requests\UpdateUserExperiencesRequest;
use App\Models\User;
use App\Models\UserExperience;
use Illuminate\Http\Request;

class UserExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserExperience::query()
            ->get();
        return response()->json(
            [
                "data" => $data,
                "messege" => "sukses",
                "status" => true
            ]

        );


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserExperiencesRequest $request, User $user)
    {
        $payload = $request->validated();

        $userExperience = $user->userExperience()->create($payload);

        //$user = $request->user()->userExperience()->create();

        $userExperience->save();

        return response()->json(
            ["data" => $userExperience]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = UserExperience::query()
            ->where('id', "=", $id)
            ->first();

        return response()->json(
            [
                "data" => $data,
                "message" => "sukses",
                "status" => true
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserExperiencesRequest $request, string $id)
    {
        $user = UserExperience::query()
            ->where('id', "=", $id)
            ->first();

        $payload = $request->validated();

        $user->update($payload);

        return response()->json(
            ["data" => $user]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = UserExperience::find($id);

        if (!$client) {
            return response()->json(['message' => 'User is not found'], 404);
        }

        $client->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}