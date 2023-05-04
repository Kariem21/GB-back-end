<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class personResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'country'=>$this->country,
            'religion'=>$this->religion,
            'gender'=>$this->gender,
            'national_id'=>$this->national_id,
            'role'=>$this->role,
        ];
    }
}
