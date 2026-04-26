<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::view('/','welcome', [
    'title' => 'HomeTiile',

]);

Route::view('/about','about');

Route::view('/contact','contact', [
    'title' => [
        'title' => 'Contact',
        'description' => 'Contact us for more information',
        'keywords' => 'contact, us, information',
        'author' => 'John Doe',
        'robots' => 'index, follow',
        'canonical' => 'https://www.example.com',
        'og:title' => 'Contact Us',
        'og:description' => 'Contact us for more information',
        'og:image' => 'https://www.example.com/image.jpg',
    ],
]);

Route::view('/ideas/create', 'ideas.create', [
    'title' => 'New Idea',
])->name('ideas.create');

Route::post('/ideas', function (Request $request) {
    $validated = $request->validate([
        'idea' => ['required', 'string', 'min:3', 'max:500'],
    ]);

    // For now we just flash it (no DB yet).
    return back()
        ->withInput()
        ->with('success', 'Idea submitted!')
        ->with('idea_submitted', $validated['idea']);
})->name('ideas.store');

