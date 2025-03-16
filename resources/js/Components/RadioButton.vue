<template>
  <label
    class="flex-1 border-2 border-purple-300 p-8 rounded-xl shadow-md hover:shadow-xl transition-all cursor-pointer bg-white hover:bg-purple-50 flex flex-col items-center justify-center text-center [&:has(input:checked)]:bg-purple-100 [&:has(input:checked)]:border-purple-400 [&:has(input:checked)]:shadow-xl relative"
  >
    <input type="radio" :id :name :value class="hidden" v-model="model" />
    <span
      v-if="selectedText"
      class="absolute bg-purple-300 aspect-square flex justify-center items-center border-3 border-purple-500/75 text-4xl -top-2 -right-2 right px-2 rounded-full font-medium opacity-0 [input:checked~&]:opacity-100 transition-opacity rotate-15"
    >
      {{ selectedText }}
    </span>
    <span class="text-2xl font-medium">{{ label }}</span>
    <span class="text-purple-600 mt-2">{{ subtext }}</span>
  </label>
</template>

<script setup lang="ts">
defineProps<{
  id: string;
  label: string;
  value: boolean | string | undefined;
  subtext: string;
  selectedText?: string;
}>();
const model = defineModel();
</script>
