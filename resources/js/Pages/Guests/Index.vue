<template>
  <Layout>
    <Head title="Guests" />
    <Card>
      <div class="max-w-4xl mx-auto">
        <h2 class="heading text-3xl font-bold mb-4 text-gray-800">
          Guest List
        </h2>
        <p class="text-gray-600 mb-8">
          Welcome to our guests page. Here you can find information about our
          guests.
        </p>

        <div v-if="guests.length" class="space-y-4">
          <div
            class="grid grid-cols-12 gap-4 font-semibold text-gray-700 pb-2 border-b"
          >
            <div class="col-span-5">Name</div>
            <div class="col-span-3">Invitation</div>
            <div class="col-span-4">Status</div>
          </div>

          <div
            v-for="guest in guests"
            class="grid grid-cols-12 gap-4 py-3 hover:bg-gray-50 rounded-lg transition-colors"
          >
            <div class="col-span-5">
              <span class="font-medium"
                >{{ guest.first_name }} {{ guest.last_name }}</span
              >
              <span v-if="guest.email" class="text-gray-500 text-sm ml-2"
                >({{ guest.email }})</span
              >
            </div>
            <div class="col-span-3 text-gray-600">
              {{ guest.invitation.slug }}
            </div>
            <div class="col-span-4">
              <span
                :class="{
                  'px-3 py-1 rounded-full text-sm font-medium': true,
                  'bg-yellow-100 text-yellow-800': guest.attending === null,
                  'bg-green-100 text-green-800': guest.attending === true,
                  'bg-red-100 text-red-800': guest.attending === false,
                }"
              >
                <template v-if="guest.attending === null">TBD</template>
                <template v-else-if="guest.attending">Attending</template>
                <template v-else>Not attending</template>
              </span>
            </div>
          </div>
        </div>

        <div v-else class="text-center py-8 text-gray-500">No guests yet.</div>
      </div>
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
