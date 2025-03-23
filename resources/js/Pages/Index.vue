<template>
  <Layout>
    <Card>
      <section class="flex flex-col items-center justify-center">
        <Divider :height="60" class="opacity-30" />

        <h1 class="text-center mb-12 heading text-8xl">Save the Date</h1>

        <div class="w-24 h-px bg-black mx-auto mb-8 opacity-30"></div>

        <p class="text-xl tracking-[0.25em] font-light text-center">
          NOVEMBER 8
        </p>
        <p class="text-xl tracking-[0.25em] font-light text-center">2025</p>

        <div class="w-24 h-px bg-black mx-auto opacity-30 my-8"></div>

        <p class="text-sm font-light italic mb-2">For the wedding of</p>

        <p class="text-xl tracking-[0.25em] font-light text-center mb-8">
          ELLEN GORMLEY <span class="heading"> & </span> NOLAN PHILLIPS
        </p>

        <div class="w-24 h-px bg-black mx-auto mb-8 opacity-30"></div>

        <p class="text-sm font-light italic mb-2">Located in</p>
        <p class="text tracking-[0.25rem] font-light text-center mb-2">
          CHARLOTTETOWN, PRINCE EDWARD ISLAND
        </p>

        <div class="w-24 h-px bg-black mx-auto mb-8 opacity-30"></div>

        <p class="text-sm font-light italic">
          Invitations to be sent via email
        </p>

        <Divider :height="60" class="opacity-30 mt-8" />
      </section>
    </Card>
  </Layout>
</template>
<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import Card from "@/Components/Card.vue";
import Divider from "@/Components/Divider.vue";
</script>
