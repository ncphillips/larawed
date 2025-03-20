<x-mail::message>
# You've Been Invited

You have been invited to join us for a wedding...our wedding!

Huzzah!

<x-mail::button :url="route('rsvp.show', [$guest->invitation->slug])">
    RSPV Now!
</x-mail::button>

Ellen & Nolan
</x-mail::message>
