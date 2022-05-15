<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
  public function index(){
      return view("auth.login");
  }
  public function register(){
      return view("auth.register");
  }
  public function forgotpassword(){
      return view("auth.forgotpassword");
  }
  public function resetpassword(){
      return view("auth.resetpassword");
  }
  //requete ajax pour recuperer les donnee de l'utilisateur
  public function saveUser(Request $request){
    // print_r($_POST);
    $validator= Validator::make($request->all(),[
        'name'=>'required|max:50',
        'email'=>'required|email|unique:users|max:100',
        'password'=>'required|min:6|max:50',
        'cpassword'=>'required|min:6|same:password'
    ],[ 
        'cpassword.same'=>'vos mot de passe ne correspondes pas',
        'cpassword.required'=>'le mot de passe de confirmation est requis'
    ]) ;
    if($validator->fails()){
        return response()->json([
            'status'=> 400,
            'messages'=>$validator->getMessageBag()
        ]);
    }else{
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->getPassword);
        $user->save();
        return  response()->json([
            'status'=>200,
            'messages'=>'inscription effectuer avec success'
        ]);

    }
  }
}
