<template>
  <div v-if="links.length > 3">
    <div
      class="grid px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-700"
    >
      <span class="col-span-3"></span>
      <!-- Pagination -->
      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
          <ul class="inline-flex items-center">
            <div v-for="link in links" :key="link.url">
              <li v-if="link.url === null">
                <div
                  class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                  v-html="link.label"
                ></div>
              </li>
              <li v-else>
                <inertia-link
                  class="px-3 text-white py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                  :class="{
                    ' transition-colors duration-150 border-purple-600  bg-purple-600':
                      link.active,
                  }"
                  :href="link.url"
                  v-html="link.label"
                >
                </inertia-link>
              </li>
            </div>
          </ul>
        </nav>
      </span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
};
</script>