<script setup lang="ts">
import { defineProps } from 'vue';
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// Define the 'jobs' prop that comes from the backend
const props = defineProps({
  jobs: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- Hero Section -->
    <Hero />

    <!-- Job List Table -->
    <div class="bg-white py-5">
      <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Job Listings</h2>

        <!-- Job Table -->
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Job Title</th>
              <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Company Image</th>
              <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Description</th>
              <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Location</th>
              <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Date Posted</th>
              <th class="py-3 px-6 text-left text-sm font-medium text-gray-700">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Loop through each job and display it in a table row -->
            <tr v-for="(job, index) in props.jobs" :key="index" class="border-b">
              <td class="py-3 px-6">{{ job.title }}</td>

              <!-- Display the company logo/image if available -->
              <td class="py-3 px-6">
                <img
                  v-if="job.image"
                  :src="job.image"
                  alt="Company Logo"
                  class="w-16 h-16 object-cover rounded-full"
                />
                <span v-else class="text-gray-500">No Image</span>
              </td>

              <td class="py-3 px-6">{{ job.description }}</td>
              <td class="py-3 px-6">{{ job.location }}</td>
              <td class="py-3 px-6">{{ job.date_posted }}</td>
              <td class="py-3 px-6">
                <!-- Apply button (You can add functionality here) -->
                <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
                  Apply Now
                </button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- No jobs available message -->
        <p v-if="props.jobs.length === 0" class="text-center text-gray-500 mt-4">No jobs available.</p>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.container {
  max-width: 1200px;
  margin: 0 auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 12px;
  text-align: left;
  border: 1px solid #e5e7eb;
}

thead {
  background-color: #f3f4f6;
}

tbody tr:nth-child(even) {
  background-color: #f9fafb;
}

button {
  transition: background-color 0.2s ease;
}

button:hover {
  background-color: #2563eb;
}

/* Styling the company image */
img {
  max-width: 100%;
  border-radius: 50%;
}
</style>
