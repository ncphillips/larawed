<template>
  <Layout>
    <Head title="Guests" />
    <Card>
      <h2 class="heading text-3xl mb-3">Guests</h2>
      <p class="text-gray-600">
        Welcome to our guests page. Here you can find information about our
        guests.
      </p>
      <ul v-if="guests.length" class="w-full mt-4">
        <li v-for="guest in guests" class="w-full flex justify-between">
          <span>
            {{ guest.first_name }} {{ guest.last_name }}

            <span v-if="guest.email">({{ guest.email }})</span>
          </span>
          <span>
            {{ guest.invitation.slug }}
          </span>
          <span>
            <template v-if="guest.attending === null">TBD</template>
            <template v-else-if="guest.attending">Attending</template>
            <template v-else>Not attending</template>
          </span>
        </li>
      </ul>
      <p v-else>No guests yet.</p>
    </Card>
  </Layout>
</template>
<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import Guest = App.Models.Guest;
import Invitation = App.Models.Invitation;

type GuestWithInvitation = Guest & { invitation: Invitation };

defineProps<{
  guests: GuestWithInvitation[];
}>();
</script>
