<template>
  <Layout>
    <Head title="RSVP to Nolan & Ellen's Wedding" />
    <Card>
      <form
        @submit.prevent="form.put(route('rsvp.update', invitation.slug))"
        class="flex flex-col gap-8 w-full"
      >
        <h2 class="heading text-8xl text-center">A Wedding</h2>
        <p class="text-center text-lg">
          We're getting married on November 8th, 2025! We'd love to have you
          there to celebrate with us. Please let us know if you can make it by
          filling in the form below.
        </p>
        <fieldset v-for="(guest, index) in invitation.guests">
          <legend class="text-2xl mb-4 font-smi-bold text-center w-fit">
            Will <strong>{{ guest.first_name }}</strong> be attending the
            wedding?
          </legend>
          <div class="gap-4 grid grid-cols-2">
            <RadioButton
              :id="`${guest.id}-attendance-yes`"
              label="Yes!"
              :value="true"
              subtext="I'll be there"
              selectedText="🎉"
              v-model="form.guests[index].attending"
            />
            <RadioButton
              :id="`${guest.id}-attendance-no`"
              label="No"
              :value="false"
              subtext="I can't make it"
              selectedText="😭"
              v-model="form.guests[index].attending"
            />
          </div>
        </fieldset>

        <AButton type="submit"> Send RSVP</AButton>

        <a
          :href="route('faq')"
          class="text-center underline text-purple-700 text-xl"
        >
          Have any questions? Check out the FAQ
        </a>
      </form>
    </Card>
  </Layout>
</template>
<script setup lang="ts">
import Layout from "@/Layouts/Layout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Invitation = App.Models.Invitation;
import Card from "@/Components/Card.vue";
import RadioButton from "@/Components/RadioButton.vue";
import Guest = App.Models.Guest;
import { route } from "ziggy-js";
import AButton from "@/Components/AButton.vue";

const { invitation } = defineProps<{
  invitation: Invitation & { guests: Guest[] };
}>();

const form = useForm({
  songs: "",
  questions: "",
  message: "",
  guests: invitation.guests.map((guest) => ({
    id: guest.id,
    attending: guest.attending,
  })),
});
</script>
