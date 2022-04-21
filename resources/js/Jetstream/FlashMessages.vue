<template>
<div>
  <div class="absolute bottom-10 right-10">
    <div
      v-if="$page.props.flash.success && show"
      class="flex items-center justify-between bg-green-500 rounded max-w-xl"
    >
      <div class="flex items-center">
        <svg
          class="w-6 h-6 mx-5"
          fill="white"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <div class="py-4 text-white text-sm font-medium">
          {{ $page.props.flash.success }}
        </div>
      </div>
      <button type="button" class="group mr-2 p-2" @click="show = false">
        <svg
          class="w-6 h-6 group-hover:fill-white"
          fill="white"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
    </div>
    <div
      v-if="
        ($page.props.flash.error ||
          Object.keys($page.props.errors).length > 0) &&
        show
      "
      class="m-8 my-3 -mb-2 flex items-center justify-between bg-red-400 rounded max-w-3xl"
    >
      <div class="flex items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 mx-5"
          viewBox="0 0 20 20"
          fill="White"
        >
          <path
            fill-rule="evenodd"
            d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
            clip-rule="evenodd"
          />
        </svg>
        <div
          v-if="$page.props.flash.error"
          class="py-4 text-white text-sm font-medium"
        >
          {{ $page.props.flash.error }}
        </div>
        <div v-else class="py-4 text-white text-sm font-medium">
          <span v-if="Object.keys($page.props.errors).length === 1"
            >Existe un error en el formulario.</span
          >
          <span v-else
            >Existen {{ Object.keys($page.props.errors).length }} errores en el
            formulario.</span
          >
        </div>
      </div>
      <button type="button" class="group mr-2 p-2" @click="show = false">
        <svg
          class="w-6 h-6 group-hover:fill-white"
          fill="white"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
    </div>
    </div>
  </div>
</template>

<script>
export default {

  data() {
    return {
      show: true,
    };
  },
  
  watch: {
    "$page.props.flash": {
      handler() {
        this.show = true;
        setTimeout(() => (this.show = false), 2000);
         
      },
      deep: true,

    },

  },
  
};
</script>
