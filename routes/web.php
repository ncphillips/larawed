<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index');
});

Route::get('/location', function () {
    return inertia('Location');
});
