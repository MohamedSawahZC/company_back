<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Passport\Passport;

class UserController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name']=$user->name;
        return response()->json(['status' => 'Success','token'=>$success['token'],'data'=>$user],201);
    }

    
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
           $user = Auth::user();
           $success['token'] = $user->createToken('MyApp')->accessToken;
           return response()->json(['status' => 'Success','token'=>$success['token'],'data'=>$user],201);

        }
    }

    public function details(){
        $user = Auth::user();
        if (!$user){
            return response()->json(['status' => 'Error','message'=>"No user founded"],404);
        }else{
            return response()->json(['status' => 'Success','data'=>$user],200);
        }

    }
}