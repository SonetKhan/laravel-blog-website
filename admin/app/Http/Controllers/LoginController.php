<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adminModel;

class LoginController extends Controller
{
    function loginIndex(){
        return view('Login');
    }
    function onLogin(Request $request){

        $email = $request->input('email');

        $psw = $request->input('psw');

      $countValue = adminModel::where('email','=',$email)->where('password','=',$psw)->count();

      if($countValue==1){
          $request->session()->put('email',$email);
          return 1;
      }else{

         return 0;
      }
    }
    function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
