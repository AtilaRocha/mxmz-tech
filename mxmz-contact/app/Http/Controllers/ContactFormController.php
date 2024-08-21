<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function showForm()
    {
        return view('contact-form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'summary' => 'required|string|max:500',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

    $filePath = null;
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filePath = $file->store('files', 'public');
    }

        ContactForm::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'summary' => $request->input('summary'),
            'description' => $request->input('description'),
            'file' => $filePath,
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }
}

