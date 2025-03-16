<template>
  <Layout>
    <Card>
      <section class="flex flex-col items-center justify-center">
        <h2 class="heading text-3xl">On the Date</h2>
        <p class="body text-2xl font-light">Saturday, November 8th 2025</p>
      </section>

      <section class="flex flex-col items-center justify-center">
        <h2 class="heading text-3xl mb-3">Location</h2>
        <p class="body text-2xl font-light">The Haviland Club</p>
        <p class="body text-lg font-light">
          2 Haviland St, Charlottetown, PE C1A 3S6
        </p>
        <a class="link" href="/location">Learn more</a>
      </section>
    </Card>
  </Layout>
</template>
<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import Card from "@/Components/Card.vue";
</script>
