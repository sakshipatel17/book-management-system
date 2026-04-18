<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('detail');
    }
    public function save_feedback_fun(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);

        $data = new Feedback;
        $data->fullname = $request->fullname;
        $data->email = $request->email;
        $data->message = $request->message;
        
        $data->save();
        return redirect('/');
    }
}
