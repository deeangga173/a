<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
            'number_phone' => $this->number_phone,
            'address' => $this->address,
            'profile_photo' => $this->profile_photo,
            'profession' => $this->profession,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'role'=>$this->role,
            'updated_at' => $this->updated
        ];
}
}
    

