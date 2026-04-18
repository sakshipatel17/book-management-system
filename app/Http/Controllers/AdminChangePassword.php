<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logins;

class AdminChangePassword extends Controller
{
    public function index()
    {
        return view('admin.change_pwd_form');
    }
    public function admin_update_password_fun(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255',
            'repassword' => 'required'

        ]);
        Logins::where('email',$request->email)->update(['password'=>md5($request->password)]);
        return redirect('/admin_dashboard');   
    }
}
