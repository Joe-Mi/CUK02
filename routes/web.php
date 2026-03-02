<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\AttendanceController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', eventController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::get('/statistics', [StatisticsController::class, 'show'])->name('statistics');
});

Route::get('/', [eventController::class, 'publicIndex'])->name('home');

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

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/ticket/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/ticket', [TicketController::class, 'show'])->name('tickets.show');

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
