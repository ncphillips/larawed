<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index');
});

Route::get('/location', function () {
    return inertia('Location');
});

Route::resource('guests', GuestController::class);