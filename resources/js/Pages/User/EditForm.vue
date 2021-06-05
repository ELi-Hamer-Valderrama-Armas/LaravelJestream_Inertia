<template>
  <div>
    <app-layout>
      <div class="container px-6 mx-auto grid">
        <ul class="flex py-6 text-sm lg:text-base">
          <li class="inline-flex text-gray-700 items-center dark:text-gray-400">
            <inertia-link :href="route('usuarios.index')"
              >Usuarios</inertia-link
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
              Editar Usuario
            </h2>

            <div>
              <jet-label for="Nombre" value="Nombre" />
              <jet-input
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                placeholder="Nombre Área"
                autocomplete="off"
              />
              <div
                v-if="errors.name"
                class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
              >
                El nombre es requerido
              </div>
            </div>

            <div>
              <jet-label for="Email" value="Email" />
              <jet-input
                id="email"
                type="text"
                class="mt-1 block w-full"
                v-model="form.email"
                placeholder="Email"
                autocomplete="off"
              />
              <div
                v-if="errors.email"
                class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
              >
                El Email es requerido
              </div>
            </div>
            <div>
              <jet-label for="role" value="Tipo de Rol" />

              <select
                class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                v-model="form.role"
              >
                <option value="administrador">
                  administrador
                </option>
                <option value="usuario">usuario</option>
              </select>
              <div
                v-if="errors.role"
                class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
              >
                El Rol es requerido
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
  props: {
    usuarios: Array,
    errors: Object,
  },
  data() {
    return {
        
      form: {
        name: JSON.parse(this.$props.usuarios).name,
        email: JSON.parse(this.$props.usuarios).email,
        role: JSON.parse(this.$props.usuarios).role,
      },
    };
  },
  methods: {
    submit() {
      console.log(this.form.role);
      /*  this.$inertia.put(
        route("usuarios.update", JSON.parse(this.$props.usuarios).id),
        this.form
      );*/
    },
  },
};
</script>
