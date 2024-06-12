<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Contact;

Route::get('/dashboard', function () {
    $contacts = Contact::all();
    return Inertia::render('Dashboard', ['contacts' => $contacts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // SHOW AND CREATE CONTACT
    Route::get('/create-contact', [ContactController::class, 'createContact'])->name('contact.create');
    Route::post('/create-contact', [ContactController::class, 'store'])->name('contact.store');
});

require __DIR__.'/auth.php';
