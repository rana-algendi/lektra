<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    public function __construct()
    {
        Config::set('auth.defaults.guard','ChildParent-api');
    }   
    
    public function upload(Request $request)
    {
      $validator= Validator::make($request->all(),[
        'name' => 'required|string|between:2,100' ,
        'about' => 'string|between:2,100',
        'address' => 'string|between:2,100',
        'phone' => 'string|min:11' ,
        'image' => '' ,


      ]);
      if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(),400); 
      }
      $user = Hospital::create(array_merge(
        $validator->validated(),
        ['password'=>bcrypt($request->password)]
      ));
      return response()->json([
        'message' => 'Hospital successfully Added' ,
        'user' => $user
      ],201);
    }
    
    

    
}
