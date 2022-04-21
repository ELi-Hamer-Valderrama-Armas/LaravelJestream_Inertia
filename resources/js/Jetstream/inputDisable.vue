
 <template>
  <input
     class="appearance-none focus:ring-purple-500 border-gray-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-800 dark:bg-gray-700  dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-white dark:border-gray-800"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
  />
</template>

<script>
export default {
  props: ["modelValue"],

  emits: ["update:modelValue"],

  methods: {
    focus() {
      this.$refs.input.focus();
    },
  },
};
</script>