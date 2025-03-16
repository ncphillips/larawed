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
        <iframe
          class="rounded border"
          width="100%"
          height="300"
          style="border: 0"
          loading="lazy"
          frameborder="0"
          scrolling="no"
          marginheight="0"
          marginwidth="0"
          src="https://www.openstreetmap.org/export/embed.html?bbox=-63.13092,46.23252,-63.12692,46.23452&layer=mapnik&marker=46.23352,-63.12892"
        ></iframe>
        <a
          href="https://www.openstreetmap.org/?mlat=46.23352&mlon=-63.12892#map=18/46.23352/-63.12892"
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
