<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Logins;

class ForgetPasswordController extends Controller
{
    public function index(Request $request)
    {
        return view('forget_pwd_form');
    }
    public function forget_password_send_mail(Request $request)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999) . mt_rand(1000000, 9999999) . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);

        Logins::where('email',$request->emailid)->update(['password'=>md5($string)]);
        $chk = Logins::all();

        $data = ['name' => 'Click the link to reset password', 'data' => 'http://127.0.0.1:8000/reset_password', 'new_pwd' => $string];
        $user['to'] = $request->emailid;
        Mail::send('forget_pwd_msg', $data, function ($mssage) use ($user) {
            $mssage->to($user['to']);
            $mssage->subject('Recover Password - Laravel Project');
        });
        return "<h1 style='color:white;background-color:navy;padding:30px;margin:20px;border-radius:45px;'>Check out your mail..!!</h1>";
    }
}
