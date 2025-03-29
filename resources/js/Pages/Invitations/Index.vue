<template>
  <Layout>
    <Head title="Index" />
    <div>
      <Card>
        <h2 class="heading text-3xl mb-3">Invitations</h2>

        <table class="w-full mb-8">
          <thead>
            <tr>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
                :class="{
                  'bg-purple-400 text-white px-2': !activeFitler,
                }"
                @click="activeFitler = null"
              >
                TOTAL INVITATIONS
              </th>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
                :class="{
                  'bg-purple-400 text-white px-2':
                    activeFitler === 'missing-emails',
                }"
                @click="activeFitler = 'missing-emails'"
              >
                NO EMAIL ADDRESSES
              </th>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
                :class="{
                  'bg-purple-400 text-white px-2': activeFitler === 'sent',
                }"
                @click="activeFitler = 'sent'"
              >
                EMAILS SENT
              </th>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
                :class="{
                  'bg-purple-400 text-white px-2': activeFitler === 'responded',
                }"
                @click="activeFitler = 'responded'"
              >
                RSVPs
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{ invitations.length }}
              </td>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{
                  invitations
                    .filter((i) => i.guests.some((g) => g.attending === null))
                    .filter((i) => i.guests.every((g) => !g.email)).length
                }}
              </td>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{
                  invitations
                    .filter((i) => i.guests.some((g) => g.invitation_sent_at))
                    .filter((i) => i.guests.every((g) => g.attending === null))
                    .length
                }}
              </td>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{
                  invitations.filter((i) =>
                    i.guests.some((g) => g.attending !== null),
                  ).length
                }}
              </td>
            </tr>
          </tbody>
        </table>

        <table class="w-full">
          <thead>
            <tr>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
              >
                TOTAL GUESTS
              </th>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
              >
                NOT RESPONDED
              </th>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
              >
                ATTENDING
              </th>
              <th
                class="px-6 py-4 text-left text-sm tracking-[0.15em] font-light text-gray-600 border-b border-gray-200"
              >
                NOT ATTENDING
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{ allGuests.length }}
              </td>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{ allGuests.filter((g) => g.attending === null).length }}
              </td>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{ allRespondedGuests.filter((g) => g.attending).length }}
              </td>
              <td
                class="px-6 py-4 text-2xl font-light text-gray-800 text-center"
              >
                {{ allRespondedGuests.filter((g) => !g.attending).length }}
              </td>
            </tr>
          </tbody>
        </table>

        <div v-for="invitation in filteredInvitations" class="w-full">
          <div class="flex justify-between items-center">
            <h3 class="heading text-4xl mb-2 hover:underline">
              <x-link :href="route('rsvp.show', { slug: invitation.slug })">
                {{ invitation.slug }}
              </x-link>
            </h3>
            <template
              v-if="!invitation.guests.every((g) => g.attending !== null)"
            >
              <x-link
                v-if="invitation.guests.find((guest) => !!guest.email)"
                method="post"
                class="border border-purple-800 rounded-md px-2 py-1 text-purple-700 hover:bg-purple-700 hover:text-white"
                :class="[
                  !isInvitationSent(invitation)
                    ? 'bg-purple-800 text-white'
                    : 'bg-white text-purple-700',
                ]"
                :href="
                  route('invitations.send', {
                    invitation: invitation.id,
                  })
                "
              >
                <span v-if="!isInvitationSent(invitation)"
                  >Send Invitations</span
                >
                <span v-else>Resend Invitations</span>
              </x-link>
              <span
                v-else
                class="text-gray-500 text-sm rounded-lg px-2 py-1 bg-gray-100 border border-gray-200"
              >
                Emails Missing
              </span>
            </template>
          </div>
          <ul class="flex flex-col gap-2">
            <li
              v-for="guest in invitation.guests"
              class="flex justify-between gap-2"
            >
              <span>
                {{ guest.first_name }} {{ guest.last_name }}
                <span v-if="guest.email">({{ guest.email }})</span>
              </span>
              <span>
                <template v-if="guest.attending">
                  <span
                    class="bg-green-100 border border-green-900 text-green-900 rounded-lg px-2 py-0.5"
                  >
                    Attending 🎉
                  </span>
                </template>
                <template v-else-if="guest.attending === false"
                  >Not attending</template
                >
                <template v-else-if="!guest.invitation_sent_at">
                  <span v-if="guest.email" class="text-gray-500 text-sm">
                    Not yet sent
                  </span>
                </template>
                <template v-else-if="guest.attending === null">
                  Sent at
                  {{ formatMonthDay(guest.invitation_sent_at) }}
                  @
                  {{ formatTime(guest.invitation_sent_at) }}
                </template>
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
import { computed, ref } from "vue";

type InvitationWithGuests = Invitation & {
  guests: App.Models.Guest[];
};

const { invitations } = defineProps<{
  invitations: InvitationWithGuests[];
}>();

const activeFitler = ref<string | null>(null);

const filteredInvitations = computed(() => {
  if (activeFitler.value === "sent") {
    return invitations.filter((i) => isInvitationSent(i));
  }
  if (activeFitler.value === "responded") {
    return invitations.filter((i) =>
      i.guests.some((g) => g.attending !== null),
    );
  }
  if (activeFitler.value === "missing-emails") {
    return invitations
      .filter((i) => i.guests.some((g) => g.attending === null))
      .filter((i) => i.guests.every((g) => !g.email));
  }
  return invitations;
});

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

const allGuests = computed(() => {
  return invitations.flatMap((i) => i.guests);
});

const allRespondedGuests = computed(() => {
  return allGuests.value.filter((g) => g.attending !== null);
});
</script>
