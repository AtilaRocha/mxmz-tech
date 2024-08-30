<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\ContactForm;

class ContactFormTest extends TestCase
{
    /**
     * @param 
     * @return
     */
    public function test_example(): void
    {
        $contactForm = new ContactForm();

        $this->assertTrue(
            in_array('name', $contactForm->getFillable()) &&
            in_array('email', $contactForm->getFillable()) &&
            in_array('phone', $contactForm->getFillable()) &&
            in_array('summary', $contactForm->getFillable()) &&
            in_array('description', $contactForm->getFillable()) &&
            in_array('file', $contactForm->getFillable())
        );
    }
}
