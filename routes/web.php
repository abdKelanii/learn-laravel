<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\Auth\LogoutUserController;
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

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [LoginUserController::class, 'create']);
Route::post('/login', [LoginUserController::class, 'store']);

Route::delete('/logout', [LogoutUserController::class, 'destroy']);
