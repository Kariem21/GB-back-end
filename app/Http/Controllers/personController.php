<?php

namespace App\Http\Controllers;

use App\Http\classes\person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class personController extends Controller
{
    use person;
    public function updateAnyInfoInPersonController(Request $req,$id){
        return  $this->updateAnyInfoInPerson($req,$id);
    }
    public function  addCommentController(Request $req,$id){
        $validator=Validator::make($req->all(),[
            'comments'=>'required|max:255',]);
        if ($validator->fails()) {
            return $this->response(null,$validator->errors(),400);
        }
        return $this->addComment($req,$id);
    }
}
