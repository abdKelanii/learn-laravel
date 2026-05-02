<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'title' => 'HomeTiile',

]);

Route::view('/about', 'about');

Route::view('/contact', 'contact', [
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

Route::resource('ideas', IdeaController::class);
