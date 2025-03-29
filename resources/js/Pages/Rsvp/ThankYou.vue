<template>
  <Layout>
    <Head title="Thank You - RSVP Submitted" />
    <Card>
      <div class="flex flex-col gap-8 items-center text-center">
        <h2 class="heading text-8xl">Thank You!</h2>
        <p class="text-xl">
          Your RSVP has been saved. We look forward to celebrating with you!
        </p>
        <AButton :href="route('rsvp.show', invitation.slug)">
          Update RSVP
        </AButton>
      </div>
    </Card>
  </Layout>
</template>

<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import Card from "@/Components/Card.vue";
import AButton from "@/Components/AButton.vue";
import { route } from "ziggy-js";

defineProps<{
  invitation: {
    slug: string;
  };
}>();
</script>
