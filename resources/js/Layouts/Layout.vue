<template>
  <Heading />
  <main>
    <slot />
  </main>
  <footer class="px-4 py-6 text-gray-800 italic text-center">
    Made by Nolan; Supervised by Ellen.
  </footer>
</template>
<script setup lang="ts">
import Heading from "@/Components/Heading.vue";
</script>
