<?php

namespace App\Http\Controllers;

use App\Models\Guest;

class GuestController extends Controller
{
    public function index()
    {
        return inertia('Guests/Index', [
            'guests' => Guest::with('invitation')->get(),
        ]);
    }
}
