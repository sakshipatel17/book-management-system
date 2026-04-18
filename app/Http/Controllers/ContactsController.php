<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts');
    }
    public function save_contact_fun(Request $request)
    {
        $request->validate([
            'yourname' => 'required',
            'youremail' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ]);

        $data = new Contacts;
        $data->yourname = $request->yourname;
        $data->youremail = $request->youremail;
        $data->subject = $request->subject;
        $data->message = $request->message;
        
        $data->save();
        return redirect('/');
    }
}
