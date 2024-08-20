<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

Route::get('/', function () {
    return view('form');
});

Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactFormController::class, 'submitForm']);