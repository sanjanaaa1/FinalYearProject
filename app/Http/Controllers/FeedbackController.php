<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function showForm()
    {
        return view('fontend.feedback');
    }

    public function submitFeedback(Request $request)
    {
        $request->validate([
            'experience' => 'required',
            'message' => 'required',
            'email' => 'nullable|email',
        ]);

        // Create a new feedback entry
        Feedback::create([
            'experience' => $request->experience,
            'message' => $request->message,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}