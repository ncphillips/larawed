<template>
  <Layout>
    <Head title="Index" />
    <div>
      <Card>
        <h2 class="heading text-3xl mb-3">Invitations</h2>
        <div v-for="invitation in invitations" class="w-full">
          <div class="flex justify-between items-center">
            <h3 class="heading text-4xl mb-2 hover:underline">
              <x-link :href="route('rsvp.show', { slug: invitation.slug })">
                {{ invitation.slug }}
              </x-link>
            </h3>
            <x-link
              method="post"
              class="border border-purple-700 rounded-md px-2 py-1 text-purple-700 hover:bg-purple-700 hover:text-white"
              :class="[
                !isInvitationSent(invitation)
                  ? 'bg-purple-700 text-white'
                  : 'bg-white text-purple-700',
              ]"
              :href="
                route('invitations.send', {
                  invitation: invitation.id,
                })
              "
            >
              <span v-if="!isInvitationSent(invitation)">Send Invitations</span>
              <span v-else>Resend Invitations</span>
            </x-link>
          </div>
          <ul>
            <li
              v-for="guest in invitation.guests"
              class="flex justify-between gap-2"
            >
              <span>
                {{ guest.first_name }} {{ guest.last_name }}
                <span v-if="guest.email">({{ guest.email }})</span>
              </span>
              <span>
                <template v-if="!guest.invitation_sent_at">
                  Not yet sent
                </template>
                <template v-else-if="guest.attending === null">
                  Sent at
                  {{ formatMonthDay(guest.invitation_sent_at) }}
                  @
                  {{ formatTime(guest.invitation_sent_at) }}
                </template>
                <template v-else-if="guest.attending">Attending</template>
                <template v-else>Not attending</template>
              </span>
            </li>
          </ul>
        </div>
      </Card>
    </div>
  </Layout>
</template>
<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
import Invitation = App.Models.Invitation;
import Card from "@/Components/Card.vue";
import { route } from "ziggy-js";
import XLink from "@/Components/x-link.vue";

type InvitationWithGuests = Invitation & {
  guests: App.Models.Guest[];
};

defineProps<{
  invitations: InvitationWithGuests[];
}>();

function formatMonthDay(date: string) {
  return new Date(date).toLocaleDateString("en-US", {
    month: "long",
    day: "numeric",
  });
}

function formatTime(date: string) {
  return new Date(date).toLocaleTimeString("en-US", {
    hour: "numeric",
    hour12: true,
  });
}

function isInvitationSent(invitation: InvitationWithGuests) {
  return invitation.guests.filter((guest) => guest.invitation_sent_at).length;
}
</script>
