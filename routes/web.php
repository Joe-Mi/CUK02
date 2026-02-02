<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/committee', function () {
    return view('committe');
})->name('committee');

Route::get('/thematic', function () {
    return view('thematic');
})->name('thematic');

Route::get('/program', function () {
    return view('program');
})->name('program');

Route::get('/sponsors', function () {
    return view('collaboration');
})->name('sponsors');

Route::get('/visa', function () {
    return view('visa');
})->name('visa');

Route::get('/hotels', function () {
    return view('hostels');
})->name('hotels');

Route::get('/wall', function () {
    return view('wall');
})->name('wall');

Route::get('/register', function () {
    return view('registration');
})->name('register');

// Assuming welcome is the 2026 conference page as referenced by cuk9/index.php
Route::get('/conference2026', function () {
    return view('welcome');
})->name('conference2026');

Route::get('/speech', function () {
    return view('speech');
})->name('speech');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
