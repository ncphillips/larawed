<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Invitation;

class RsvpController extends Controller
{
    public function show(string $slug)
    {
        $invitation = Invitation::where('slug', '=', $slug)->with('guests')->firstOrFail();

        return inertia('Rsvp/Edit', [
            'invitation' => $invitation,
        ]);
    }

    public function update(string $slug)
    {
        $data = request()->validate([
            'guests.*.id' => 'required|exists:guests,id',
            'guests.*.attending' => 'nullable|boolean',
        ]);

        foreach ($data['guests'] as $guestData) {
            $guest = Guest::find($guestData['id']);

            $guest->update([
                'attending' => $guestData['attending'],
            ]);
        }

        return redirect()->route('rsvp.show', $slug);
    }
}
