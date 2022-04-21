<template>
<div>
  <app-layout>

      <div class="container px-6 mx-auto grid">
      <ul class="flex py-6 text-sm lg:text-base">
        <li class="inline-flex text-gray-700 items-center dark:text-gray-400">
          <inertia-link :href="route('categorias.index')"
            >Categorias</inertia-link
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
            class="my-2 text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            Editar categoría
          </h2>
          
          <div>
            <jet-label for="Nombre" value="Nombre" />
            <jet-input
              id="Nombre"
              type="text"
              class="mt-1 block w-full"
              v-model="form.Nombre"
              placeholder="Nombre Categoría"
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
            <jet-label for="Descripcion" value="Descripción" />
            <jet-input
              id="Descripcion"
              type="text"
              class="mt-1 block w-full"
              v-model="form.Descripcion"
              placeholder="Descripción Categoría"
              autocomplete="off"
            />
            <div
              v-if="errors.Descripcion"
              class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
            >
              La descripción es requerido
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
    categorias: Array,
    errors:Object,
    },
  data() {
    return {
      form: {
        
        Nombre: JSON.parse(this.$props.categorias).Nombre,
        Descripcion:  JSON.parse(this.$props.categorias).Descripcion,
      },
    };
  },
  methods: { 

    submit() {
      this.$inertia.put(
        route("categorias.update", JSON.parse(this.$props.categorias).id),
        this.form
      );
    },
  },
  
};
</script>