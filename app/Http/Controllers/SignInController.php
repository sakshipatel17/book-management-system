<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logins;

class SignInController extends Controller
{
    public function index()
    {
        return view('signin');
    }
    public function login_user_fun(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $userFound = Logins::where(['email' => $request->email])->first();
        if ($userFound) {
            if (md5($request->password) == $userFound->password) {
                $request->session()->put('session_user_id', $userFound->id);
                $request->session()->put('session_user_name', $userFound->name);
                $request->session()->put('session_user_photo', $userFound->image);
                if ($userFound->usertypeid == '2')
                {
                    
                    return redirect('/');   //->with('success', 'User Signed Up Successfully');
                }
                else
                {
                    return view('admin.home');
                }
            } 
            else 
            {
                return '<marquee behavior="alternate" style="color:white;background-color:navy;padding:40px;font-family:monotype corsiva;font-weight:bolder;font-size:45px;">Oops.. Wrong Username/Password..!!!</marquee>';
            }
        }
    }
    public function logout()
    {
        session()->forget(['session_user_name', 'session_user_id', 'session_user_photo']);
        return redirect('/');
    }
}
