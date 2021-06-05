<template>
<div>
  <app-layout>

      <div class="container px-6 mx-auto grid">
      <ul class="flex py-6 text-sm lg:text-base">
        <li class="inline-flex text-gray-700 items-center dark:text-gray-400">
          <inertia-link :href="route('areas.index')"
            >Áreas</inertia-link
          >
          <svg
            class="h-5 w-auto text-gray-400"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </li>
        <li class="inline-flex items-center text-gray-500">
          <div class="text-teal-400">Editar</div>
        </li>
      </ul>

      <form @submit.prevent="submit">
        <div
          class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <h2
            class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Editar Área
          </h2>
          
          <div>
            <jet-label for="Nombre" value="Nombre" />
            <jet-input
              id="Nombre"
              type="text"
              class="mt-1 block w-full"
              v-model="form.Nombre"
              placeholder="Nombre Área"
              autocomplete="off"
            />
            <div
               v-if="errors.Nombre"
              class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
            >
              El nombre es requerido 
            </div>
          </div>

          <div>
            <jet-label for="Responsable" value="Responsable" />
            <jet-input
              id="Responsable"
              type="text"
              class="mt-1 block w-full"
              v-model="form.Responsable"
              placeholder="Nombres Responsable"
              autocomplete="off"
            />
            <div
              v-if="errors.Descripcion"
              class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
            >
              El responsable es requerido
            </div>
          </div>

          <h2 class="mt-6"></h2>
          <jet-button
            class="ml-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Editar
          </jet-button>
         
        </div>
      </form>
      </div>

  </app-layout>
  </div>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";

export default {
  components: {
    AppLayout,
     JetButton,
    JetInput,
    JetLabel,
  },
  props:{
    areas: Array,
    errors:Object,
    },
  data() {
    return {
      form: {
        
        Nombre: JSON.parse(this.$props.areas).Nombre,
        Responsable:  JSON.parse(this.$props.areas).Responsable,
      },
    };
  },
  methods: { 

    submit() {
      this.$inertia.put(
        route("areas.update", JSON.parse(this.$props.areas).id),
        this.form
      );
    },
  },
  
};
</script>