<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import Divider from "@/Components/Divider.vue";
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Layout from "@/Layouts/Layout.vue";

// Helper function to create slug for IDs
const slugify = (text: string) => {
  return text
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/(^-|-$)+/g, "");
};

// Add ref for current hash
const currentHash = ref(window.location.hash);

// Update hash on navigation
onMounted(() => {
  window.addEventListener("hashchange", () => {
    currentHash.value = window.location.hash;
  });
});

const faqSections = [
  {
    title: "Schedule & Timing",
    questions: [
      {
        question: "When should I RSVP by?",
        answer:
          "Please RSVP by the end of August to help us finalize arrangements with our vendors.",
      },
      {
        question: "What's the schedule for the day?",
        answer:
          "The ceremony begins at 4:30 PM. We recommend arriving 15-20 minutes early to get settled. The reception will follow immediately after, with bar service from 5:00 PM to 11:00 PM.",
      },
      {
        question: "Will there be speeches?",
        answer:
          "No speeches or head table - we want a relaxed, enjoyable evening celebrating with our loved ones.",
      },
      {
        question: "Will there be dancing?",
        answer:
          "Yes! The dance will take place in the venue's beautiful ballroom.",
      },
    ],
  },
  {
    title: "Venue & Parking",
    questions: [
      {
        question: "Where is the wedding taking place?",
        answer:
          "The ceremony and reception will be held at the Haviland Club. For directions and a map to the venue, please check our Location page.",
      },
      {
        question: "Will the wedding be indoors or outdoors?",
        answer:
          "The wedding will be held indoors, as November weather can be unpredictable. The Haviland Club offers beautiful indoor spaces including access to the first floor, second floor, and a patio area.",
      },
      {
        question: "Is the venue accessible?",
        answer:
          "Yes, the venue is accessible. There is a ramp at the back of the building, an accessible bathroom on the first floor, and the ceremony and reception spaces are accessible. There are two additional bathrooms on the second floor.",
      },
      {
        question: "Is there parking available?",
        answer:
          "Yes, parking is available at the Culinary Institute lot directly across the street from the venue, and street parking is also available in the surrounding area.",
      },
    ],
  },
  {
    title: "Food & Drinks",
    questions: [
      {
        question: "What are the food arrangements?",
        answer:
          "Instead of a sit-down meal, we will be serving a generous selection of Hors D'oeuvres throughout the evening, catered by Gallants Catering. There will be plenty of food for everyone to enjoy!",
      },
      {
        question: "What about drinks?",
        answer:
          "The Haviland Club features a fully stocked bar that will be serving drinks from 5:00 PM to 11:00 PM. Please note that outside beverages are not permitted at the venue.",
      },
    ],
  },
  {
    title: "Guest Information",
    questions: [
      {
        question: "Can I bring my children?",
        answer:
          "Due to limited space, we are unable to accommodate children. This is an adults-only celebration.",
      },
      {
        question: "What should I wear?",
        answer:
          "The dress code is dressy-casual/semiformal. Wear something that makes you feel comfortable and festive - this is a celebration! And remember that November weather can be chilly.",
      },
      {
        question: "What is your gift policy?",
        answer:
          "Your presence is our present! Cards are welcome, but please no gifts (our house is small).",
      },
      {
        question: "What's the photography policy?",
        answer:
          "A professional photographer will be capturing our special day. To ensure the best possible ceremony photos, we kindly ask guests to keep their phones away during the ceremony. The photography schedule is as follows: Bridal party photos before the ceremony, followed by family and friend photos immediately after (before sunset at 5:00 PM).",
      },
    ],
  },
];
</script>

<template>
  <Layout>
    <Head title="FAQ" />

    <Card class="overflow-hidden">
      <div class="p-6">
        <h1 class="heading text-6xl text-center mb-4">FAQ</h1>
        <p class="text-center text-gray-600 mb-12 text-xl">
          Frequently Asked Questions
        </p>

        <nav class="toc mb-12">
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <li v-for="section in faqSections" :key="section.title">
              <a
                :href="'#' + slugify(section.title)"
                :class="[
                  'heading text-2xl text-purple-800 hover:text-purple-600 transition-colors block mb-2 group',
                  currentHash === '#' + slugify(section.title)
                    ? 'text-purple-600 rounded-sm border border-purple-600'
                    : '',
                ]"
              >
                {{ section.title }}
                <span
                  class="inline-block transition-transform group-hover:translate-x-1"
                  >→</span
                >
              </a>
              <ul class="space-y-1">
                <li
                  v-for="question in section.questions"
                  :key="question.question"
                >
                  <a
                    :href="'#' + slugify(question.question)"
                    :class="[
                      'text-gray-600 hover:text-purple-600 transition-colors group inline-flex items-center',
                      currentHash === '#' + slugify(question.question)
                        ? 'text-purple-600 bg-purple-50 -mx-2 px-2 py-0.5 rounded border border-purple-300'
                        : '',
                    ]"
                  >
                    {{ question.question }}
                    <span
                      class="inline-block transition-transform group-hover:translate-x-1 ml-1 opacity-0 group-hover:opacity-100"
                      >→</span
                    >
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>

        <div class="w-full flex justify-center">
          <Divider :height="60" class="my-8" />
        </div>

        <div
          v-for="(section, sectionIndex) in faqSections"
          :key="section.title"
          class="mb-12 last:mb-0"
        >
          <h2
            :id="slugify(section.title)"
            :class="[
              'heading text-3xl text-gray-900 mb-4 text-center group',
              currentHash === '#' + slugify(section.title)
                ? 'text-purple-800'
                : '',
            ]"
          >
            {{ section.title }}
            <a
              :href="'#' + slugify(section.title)"
              class="opacity-0 group-hover:opacity-100 ml-2 text-purple-600 hover:text-purple-800 transition-all"
            >
              #
            </a>
          </h2>
          <div v-for="(faq, faqIndex) in section.questions" :key="faq.question">
            <div class="py-4 text-center">
              <div
                :class="[
                  'transition-colors rounded py-2',
                  currentHash === '#' + slugify(faq.question)
                    ? 'bg-purple-50 border border-purple-300'
                    : '',
                ]"
              >
                <h3
                  :id="slugify(faq.question)"
                  :class="[
                    'text-lg font-medium mb-2 group transition-colors',
                    currentHash === '#' + slugify(faq.question)
                      ? 'text-purple-800'
                      : 'text-gray-900',
                  ]"
                >
                  {{ faq.question }}
                  <a
                    :href="'#' + slugify(faq.question)"
                    class="opacity-0 group-hover:opacity-100 ml-2 text-purple-600 hover:text-purple-800 transition-all"
                  >
                    #
                  </a>
                </h3>
                <p
                  :class="[
                    'transition-colors',
                    currentHash === '#' + slugify(faq.question)
                      ? 'text-gray-700'
                      : 'text-gray-600',
                  ]"
                >
                  {{ faq.answer }}
                  <Link
                    v-if="faq.question === 'Where is the wedding taking place?'"
                    href="/location"
                    class="text-purple-600 hover:text-purple-800 transition-colors"
                  >
                    View Location Details →
                  </Link>
                </p>
              </div>
            </div>
            <div class="flex justify-center">
              <Divider
                v-if="faqIndex !== section.questions.length - 1"
                :height="40"
                class="my-2"
              />
            </div>
          </div>
        </div>
      </div>
    </Card>
  </Layout>
</template>
