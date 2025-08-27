<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";

defineProps<{}>();
</script>

<template>
  <Layout>
    <Head title="Location" />
    <Card>
      <h2 class="heading text-3xl mb-3">Location</h2>
      <div class="mt-4 w-full max-w-xl">
        <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-63.13588500022889%2C46.22766472777778%2C-63.12237739562989%2C46.233431436026905&amp;layer=mapnik" style="border: 1px solid black"></iframe>
        <a
          href="https://www.openstreetmap.org/?mlat=46.230548&mlon=-63.127790#map=17/46.230548/-63.127790"
          target="_blank"
          rel="noopener noreferrer"
          class="mt-2 inline-block text-purple-600 hover:text-purple-800 transition-colors"
        >
          View larger map on OpenStreetMap
        </a>
      </div>
    </Card>
  </Layout>
</template>
