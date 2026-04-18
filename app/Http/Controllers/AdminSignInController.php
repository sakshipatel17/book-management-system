<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logins;

class AdminSignInController extends Controller
{
    public function login_in_admin_fun()
    {
        return view('admin.signin');
    }
    public function admin_login_fun(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $userFound = Logins::where(['email' => $req->email])->first();
        if ($userFound) 
        {
            if ($userFound->usertypeid == '1') 
            {
                if (md5($req->password) == $userFound->password) 
                {
                    $req->session()->put('session_admin_id', $userFound->id);
                    $req->session()->put('session_admin_name', $userFound->name);
                    $req->session()->put('session_admin_photo', $userFound->image);
                    return redirect('/admin_dashboard');
                } 
                else 
                {
                    return '<marquee behavior="alternate" style="color:white;background-color:navy;padding:40px;font-family:monotype corsiva;font-weight:bolder;font-size:45px;">Oops.. Wrong Password..!!!</marquee>';
                }
            }
            else
            {
                return '<marquee behavior="alternate" style="color:white;background-color:red;padding:40px;font-family:monotype corsiva;font-weight:bolder;font-size:45px;">U R not an admin..!!!</marquee>';
            }
        }
    }
    public function admin_dashboard_fun()
    {
        $admin_data = Logins::where('id', '=', session()->get('session_admin_id'))->get();
        return view('admin.index', compact('admin_data'));
    }
    public function logout_fun()
    {
        session()->forget(['session_admin_name', 'session_admin_id', 'session_admin_photo']);
        return view('admin.signin');
    }
}
