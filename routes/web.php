<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Group;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $contacts = Contact::all();
    $groups = Group::withCount('contacts')->get();
    return Inertia::render('Dashboard', ['contacts' => $contacts, 'groups' => $groups]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contact Routes
    Route::get('/create-contact', [ContactController::class, 'createContact'])->name('contact.create');
    Route::post('/create-contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/edit/{contact}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/contact/update/{contact}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contact/delete/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

    // Group Routes
    Route::resource('groups', GroupController::class);
});

require __DIR__.'/auth.php';
