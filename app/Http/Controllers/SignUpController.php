<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logins;


class SignUpController extends Controller
{
    public function index()
    {
        return view('signup');
    }
    public function register_user_fun(Request $request)
    {
        /*
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:logins',
            'password' => 'required|min:8|max:13',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:9048',
        ]);
        $data = new Logins;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = md5($request->password);
        $data->phone = $request->phone;
        $data->address1 = $request->address1;
        $data->address2 = $request->address2;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->zip = $request->zip;
        // Image Code
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/', $filename);
        $data->image = $filename;
        $data->usertypeid = 2;                      // 1 means admin, 2 means customer

        $data->save();
        return redirect('/');
    }
}
