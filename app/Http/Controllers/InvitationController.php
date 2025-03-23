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

    public function send(Invitation $invitation)
    {
        $invitation->guests->filter->email->each->sendInvitation();

        return redirect()->route('invitations.index');
    }
}
