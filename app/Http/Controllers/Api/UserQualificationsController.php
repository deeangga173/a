<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserQualificationsRequest;
use App\Http\Requests\UpdateUserQualificationsRequest;
use App\Models\UserQualification;
use Illuminate\Http\Request;

class UserQualificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserQualification::query()
        ->get();
        return response()->json(
            [
                "data"=>$data,
                "messege"=>"sukses",
                "status"=>true
            ]

        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserQualificationsRequest $request)
    {
        $request->validated();
        $userQualification = new UserQualification;
        
        $userQualification->user_id = $request->user_id;
        $userQualification->title = $request->title;
        $userQualification->org_qualification = $request->org_qualification;
        $userQualification->date = $request->date;
        $userQualification->attachment = $request->attachment;
        $userQualification->save();

        return response()->json(
            ["data"=> $userQualification]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $data = UserQualification::query()
        ->where('id', "=", $id)
        ->first();

        return response()->json(
            [
                "data"=>$data,
                "message"=>"sukses",
                "status"=>true
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserQualificationsRequest $request, string $id)
    {
        $userQualification = UserQualification::query()
        ->where('id',"=",$id)
        ->first();

        $payload=$request->validated();

        $data = $userQualification->update($payload);

        return response()->json(
            ["data"=> $userQualification]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = UserQualification::find($id);

        if (!$client) {
            return response()->json(['message' => 'User is not found'], 404);
        }
    
        $client->delete();
    
        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
