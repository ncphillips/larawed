<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        return inertia('Invitations/Index', [
            'invitations' => Invitation::with('guests')->get(),
        ]);
    }
}
