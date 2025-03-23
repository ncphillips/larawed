<?php

namespace App\Models;

use App\Mail\InvitationMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'guest_id',
        'invitation_sent_at',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }

    public function sendInvitation()
    {
        Mail::send(new InvitationMail($this));

        $this->update([
            'invitation_sent_at' => now(),
        ]);
    }
}
