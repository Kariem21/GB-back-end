<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class hallResource extends JsonResource
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
            'address'=>$this->address,
            'rooms'=>$this->rooms,
            'chairs'=>$this->chairs,
            'price'=>$this->price,
            'hours'=>$this->hours,
            'tables'=>$this->tables,
            'type'=>$this->type,
            'capacity'=>$this->capacity,
            'available'=>$this->available,
/*             'person_id'=>$this->person_id,
 */            'comment_count'=> $this->comments()->count(),
            'likes_count'=> $this->likes()->count(),

        ];
    }
}
