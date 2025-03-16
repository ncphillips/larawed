<template>
  <Layout>
    <Head title="Login" />
    <Card>
      <form
        @submit.prevent="form.post(route('login.store'))"
        class="flex flex-col gap-4 w-full"
      >
        <label class="flex flex-col gap-1">
          Email
          <input
            class="border border-gray-400 rounded bg-gray-100 py-2 px-3"
            name="email"
            v-model="form.email"
          />
        </label>
        <label class="flex flex-col gap-1">
          Password
          <input
            class="border border-gray-400 rounded bg-gray-100 py-2 px-3"
            name="password"
            type="password"
            v-model="form.password"
          />
        </label>
        <AButton>Sign in</AButton>
      </form>
    </Card>
  </Layout>
</template>
<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import AButton from "@/Components/AButton.vue";
import { route } from "ziggy-js";

const form = useForm({
  email: "",
  password: "",
});
</script>
