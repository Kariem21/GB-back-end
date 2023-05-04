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
    public function toArray($data)
    {
        $photos=$data->photos;
            if($photos){
                $i=0;
                for($i=0;$i<count($photos);$i++){
                    $photo[$i]="http://127.0.0.1:8000/api/hallphoto/".$data->id."/".$photos[$i]->id;
                }
            }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'country'=>$this->country,
            'city'=>$this->city,
            'street'=>$this->street,
            'rooms'=>$this->rooms,
            'chairs'=>$this->chairs,
            'price'=>$this->price,
            'hours'=>$this->hours,
            'tables'=>$this->tables,
            'type'=>$this->type,
            'capacity'=>$this->capacity,
            'available'=>$this->available,
            'start_party'=>$this->start_party,
            'end_party'=>$this->end_party,
            'owner_id'=>$hall->owner_id,
            'photos'=>$photo,
            'comment_count'=> $this->comments()->count(),
            'likes_count'=> $this->likes()->count(),
        ];
    }
}
