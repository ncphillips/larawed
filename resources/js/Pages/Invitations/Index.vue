<template>
  <Layout>
    <Head title="Index" />
    <div>
      <Card>
        <h2 class="heading text-3xl mb-3">Invitations</h2>
        <div v-for="invitation in invitations" class="w-full">
          <h3 class="heading text-4xl mb-2 hover:underline">
            <x-link :href="route('rsvp.show', { slug: invitation.slug })">
              {{ invitation.slug }}
            </x-link>
          </h3>
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
                <template v-if="guest.attending === null">TBD</template>
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
</script>
