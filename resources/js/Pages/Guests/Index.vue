<template>
  <Layout>
    <Head title="Guests" />
    <Card class="max-w-full mx-auto">
      <div class="max-w-8xl mx-auto">
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
            <div class="col-span-2">First Name</div>
            <div class="col-span-2">Last Name</div>
            <div class="col-span-3">Email</div>
            <div class="col-span-2">Invitation</div>
            <div class="col-span-2">Status</div>
            <div class="col-span-1">Actions</div>
          </div>

          <div
            v-for="guest in guests"
            class="grid grid-cols-12 gap-4 py-3 hover:bg-gray-50 rounded-lg transition-colors"
          >
            <div class="col-span-2">
              <span class="font-medium">{{ guest.first_name }}</span>
            </div>
            <div class="col-span-2">
              <span class="font-medium">{{ guest.last_name }}</span>
              <span v-if="guest.email" class="text-gray-500 text-sm ml-2 block"
                >({{ guest.email }})</span
              >
            </div>
            <div class="col-span-3 text-gray-600">
              {{ guest.email || "-" }}
            </div>
            <div class="col-span-2 text-gray-600">
              {{ guest.invitation.slug }}
            </div>
            <div class="col-span-2">
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
            <div class="col-span-1">
              <button
                @click="confirmDelete(guest)"
                class="text-red-600 hover:text-red-800 transition-colors"
                title="Delete guest"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
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
import { Head, router } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import Guest = App.Models.Guest;
import Invitation = App.Models.Invitation;
import { route } from "ziggy-js";

type GuestWithInvitation = Guest & { invitation: Invitation };

defineProps<{
  guests: GuestWithInvitation[];
}>();

const confirmDelete = (guest: GuestWithInvitation) => {
  if (
    confirm(
      `Are you sure you want to delete ${guest.first_name} ${guest.last_name}?`,
    )
  ) {
    router.delete(route("guests.destroy", guest.id));
  }
};
</script>
