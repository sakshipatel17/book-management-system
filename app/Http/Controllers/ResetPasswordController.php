<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logins;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('reset_pwd');
    }
    public function reset_password_fun(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'repassword' => 'required'
        ]);
        $userFound = Logins::where(['email' => $request->email])->first();
        if ($userFound)
        {
            Logins::where('email',$request->email)->update(['password'=>md5($request->password)]);
            return view('signin');
        }
        else
        {
            return "EmailID does not exists...";
        }

    }
}
