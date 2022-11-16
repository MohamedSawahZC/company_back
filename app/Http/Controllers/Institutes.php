<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\User;
class Institutes extends Controller
{
    public function create(Request $request){
        $input = $request->all();
        $item = new Institute();
        $item->name = $input['name'];
        $item->location = $input['location'];
        $item->save();
        if($item->save()){
            return ["status"=>"Success","data"=>$item];
        }else{
            return ["status"=>"Failure"];
        }
    }
}