<x-mail::message>
# 💍 We're Getting Married! 💍

Hey there!

We're beyond excited to invite you to celebrate with us as we tie the knot! 

We can't imagine our special day without you there, and we'd love for you to join us for some good food, great company, and maybe even a dance or two (no pressure on the dancing part 😉).

<x-mail::button :url="route('rsvp.show', [$guest->invitation->slug])">
    RSVP Here!
</x-mail::button>

Can't wait to celebrate with you!

With love,<br>Ellen & Nolan
</x-mail::message>
