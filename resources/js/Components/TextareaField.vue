<template>
  <label class="w-full">
    <span class="text-xl mb-4 font-semi-bold text-center w-fit">
      {{ label }}
    </span>
    <textarea
      :id
      :name
      :placeholder
      class="mt-2 p-2 w-full block border rounded-lg bg-gray-200/50 border-gray-100 shadow-inner resize-none"
      rows="3"
      v-model="model"
    >
    </textarea>
  </label>
</template>
<script setup lang="ts">
defineProps<{
  id: string;
  name: string;
  label: string;
  placeholder?: string;
}>();

const model = defineModel<string | null | undefined>();
</script>
