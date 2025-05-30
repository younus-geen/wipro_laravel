<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs; // Ensure you have the correct namespace for your ContactUs model
use Illuminate\Support\Facades\Validator;
class ContactUSController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // dd("i am here");
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        ContactUs::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
