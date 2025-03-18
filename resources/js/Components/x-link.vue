<template>
  <inertia-link>
    <slot />
  </inertia-link>
</template>
<script setup lang="ts">
import { Link as InertiaLink } from "@inertiajs/vue3";
import type { InertiaLinkProps } from "@inertiajs/vue3";

defineProps();
</script>
