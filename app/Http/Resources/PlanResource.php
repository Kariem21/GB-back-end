<?php

namespace App\Http\Resources;

use App\Models\Plan;
use Illuminate\Http\Resources\Json\JsonResource;
class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     *$request
     *  @param \Illuminate\Http\Request;
     *  @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $id=$request->id;
        $plan=Plan::find($request->id);
        $photos=$request->planPhotos;
        print($id);die;
            if($photos){
                $i=0;
                for($i=0;$i<count($photos);$i++){
                    $photo[$i]="http://127.0.0.1:8000/api/planphoto/".$request->id."/".$photos[$i]->id;
                }
            }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,
            'photos'=>$photo,
        ];
    }
}
