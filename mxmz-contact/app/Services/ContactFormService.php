<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Validation\ValidationException;

class ContactFormService
{
    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function validateContactForm(Request $request): array
    {
    $request->merge([
        'phone' => preg_replace('/\D/', '', $request->input('phone'))
    ]);
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'regex:/^\d{10,15}$/'],
            'summary' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'description' => ['required', 'string', 'max:1000', 'regex:/^[a-zA-Z0-9\s]*$/'],
            'file' => 'required|file|mimes:pdf|max:9216',
        ], [
            'name.required' => 'Por favor, insira seu nome.',
            'email.required' => 'O campo de email é obrigatório.',
            'phone.required' => 'O número de telefone é obrigatório.',
            'summary.required' => 'Por favor, forneça um resumo profissional.',
            'description.required' => 'A descrição é necessária.',
            'file.required' => 'Um arquivo deve ser anexado.',
            'file.mimes' => 'O arquivo deve ser um PDF.',
        ]);
    }

    /**
     * @param array $validatedData
     * @param Request $request
     * @return void
     */
    public function processContactForm(array $validatedData, Request $request): void
    {
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('files', 'public');
        }

        ContactForm::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'summary' => $validatedData['summary'],
            'description' => $validatedData['description'],
            'file' => $filePath,
        ]);
    }
}
