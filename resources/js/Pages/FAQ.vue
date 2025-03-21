<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import Heading from "@/Components/Heading.vue";
import Divider from "@/Components/Divider.vue";
import { Link } from "@inertiajs/vue3";

const faqSections = [
  {
    title: "Key Details & Timing",
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
        question: "Can I bring my children?",
        answer:
          "Due to limited space, we are unable to accommodate children. This is an adults-only celebration.",
      },
    ],
  },
  {
    title: "Venue Information",
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
    title: "Event Flow",
    questions: [
      {
        question: "What's the photography policy?",
        answer:
          "A professional photographer will be capturing our special day. To ensure the best possible ceremony photos, we kindly ask guests to keep their phones away during the ceremony. The photography schedule is as follows: Bridal party photos before the ceremony, followed by family and friend photos immediately after (before sunset at 5:00 PM).",
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
    title: "Guest Preparation",
    questions: [
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
    ],
  },
];
</script>

<template>
  <div>
    <Head title="FAQ" />

    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
      <Heading class="text-center mb-12">Frequently Asked Questions</Heading>

      <Card class="overflow-hidden">
        <div class="p-6">
          <div
            v-for="(section, sectionIndex) in faqSections"
            :key="section.title"
            class="mb-12 last:mb-0"
          >
            <h2 class="heading text-3xl text-gray-900 mb-4 text-center">
              {{ section.title }}
            </h2>
            <div
              v-for="(faq, faqIndex) in section.questions"
              :key="faq.question"
            >
              <div class="py-4 text-center">
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                  {{ faq.question }}
                </h3>
                <p class="text-gray-600">
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
    </div>
  </div>
</template>
