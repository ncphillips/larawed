<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RsvpController;
use Illuminate\Support\Facades\Route;

Route::name('home')->get('/', function () {
    return inertia('Index');
});

Route::name('location')->get('/location', function () {
    return inertia('Location');
});

Route::resource('guests', GuestController::class);
Route::resource('invitations', InvitationController::class);

Route::name('rsvp.show')->get('rsvp/{slug}', [RsvpController::class, 'show']);
Route::name('rsvp.update')->put('rsvp/{slug}', [RsvpController::class, 'update']);
