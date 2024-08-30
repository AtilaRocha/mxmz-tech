<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactFormService;
use Illuminate\Validation\ValidationException;
class ContactFormController extends Controller
{
    protected $contactFormService;

    public function __construct(ContactFormService $contactFormService){
        $this->contactFormService = $contactFormService;
    }
    public function showForm()
    {
        return view('contact-form');
    }

    public function submitForm(Request $request)
    {
        try {
            $validatedData = $this->contactFormService->validateContactForm($request);
            $this->contactFormService->processContactForm($validatedData, $request);
            return back()->with('success', 'Informações enviadas com sucesso!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }
}

