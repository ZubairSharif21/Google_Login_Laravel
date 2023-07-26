<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function loginwithgoogle(){
        return Socialite::driver('google')->redirect();
    }
    function callbackfromgoogle(){
        $user=Socialite::driver('google')->user();
        $db_user=User::where('email',$user->email)->first();
        if(!$db_user){
            $new_user=new User;
            $new_user->name=$user->getName();
            $new_user->email=$user->getEmail();
            $new_user->password=$user->getName().'@'. $user->getId();
            $new_user->google_id=$user->getId();
            $new_user->save();
            return redirect('/');

        }
    }
}
