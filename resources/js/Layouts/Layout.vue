<template>
  <Heading />

  <main>
    <slot />
  </main>

  <Card
    v-if="page.props.currentUser"
    class="mt-4 flex flex-row gap-2 justify-center"
  >
    <x-link
      :href="route('invitations.index')"
      class="underline hover:text-purple-700"
    >
      Invitations
    </x-link>
    <x-link
      :href="route('guests.index')"
      class="underline hover:text-purple-700"
    >
      Guests
    </x-link>
  </Card>
  <footer class="px-4 py-6 text-gray-800 italic text-center">
    Made by Nolan; Supervised by Ellen.
  </footer>
</template>
<script setup lang="ts">
import Heading from "@/Components/Heading.vue";
import { usePage } from "@inertiajs/vue3";
import XLink from "@/Components/x-link.vue";
import { route } from "ziggy-js";
import Card from "@/Components/Card.vue";

const page = usePage();
</script>
