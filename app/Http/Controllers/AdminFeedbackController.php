<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.showfeedback', compact('feedbacks'));
    }
    public function admin_feedback_view(Request $request)
    {
        $feedback = Feedback::where('id', '=', $request->admin_feedback_id)->get();
        return view('admin.showonefeedback', compact('feedback'));
    }
    public function admin_feedback_delete(Request $request)
    {
        $fb = Feedback::find($request->admin_feedback_id);
        $fb->delete();
        $feedbacks = Feedback::all();
        return view('admin.showfeedback', compact('feedbacks')); 
    }
}
