<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class Basic extends Controller
{
    function index(){
        return User::all();
    }

    function create(Request $req){
            $user = new User();
            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=$req->password;
            if($user->save()){
                return array("status" => "Success","data"=>$user);
            }
    }

   
}