<template>
  <div
    class="min-h-full bg-gradient-to-br from-pink-100 via-blue-100 to-purple-100"
  >
    <Heading />
    <main>
      <slot />
    </main>
    <footer class="px-4 py-6 text-gray-800 italic text-center">
      Made by Nolan; Supervised by Ellen.
    </footer>
  </div>
</template>
<script setup lang="ts">
import Heading from "@/Components/Heading.vue";
</script>
