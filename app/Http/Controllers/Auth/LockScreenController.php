<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class LockScreenController extends Controller
{
    public function lockScreen(){

        $user = Auth::user();
        //dd($user);
        //return View('auth.lock',['user' => $user]); or
        

        if(Auth::check()){
            Session::put('locked',true);
            return View('auth.lock',compact('user'));
        }else{
            return redirect('/login');
        }
    }
}
