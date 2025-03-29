<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Guest;

class InvitationController extends Controller
{
    public function index()
    {
        return inertia('Invitations/Index', [
            'invitations' => Invitation::with('guests')
                ->select('invitations.*')
                ->selectSub(
                    Guest::selectRaw('MAX(updated_at)')
                        ->whereColumn('invitation_id', 'invitations.id'),
                    'last_rsvp_at'
                )
                ->orderBy('last_rsvp_at', 'desc')
                ->get(),
        ]);
    }

    public function send(Invitation $invitation)
    {
        $invitation->guests->filter->email->each->sendInvitation();

        return redirect()->route('invitations.index');
    }
}
