<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use App\Services\ContactFormService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ContactFormServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * @return void
     */
    public function test_it_can_create_contact_form(): void
    {
        Storage::fake('public');

        $request = Request::create('/contact', 'POST', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'summary' => 'Test Summary',
            'description' => 'Test Description',
            'file' => UploadedFile::fake()->create('file.pdf', 1000, 'application/pdf')
        ]);

        $service = new ContactFormService();
        $validatedData = $service->validateContactForm($request);
        $service->processContactForm($validatedData, $request);
        $this->assertDatabaseHas('contact_forms', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'summary' => 'Test Summary',
            'description' => 'Test Description',
        ]);
        $contactForm = ContactForm::where('email', 'john.doe@example.com')->first();
        $this->assertInstanceOf(ContactForm::class, $contactForm);
    }
}
