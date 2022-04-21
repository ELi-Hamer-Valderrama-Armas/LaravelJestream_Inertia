<template>
  <div>
    <app-layout>
      <div class="container px-6 mx-auto grid">
        <ul class="flex py-6 text-sm lg:text-base">
          <li class="inline-flex text-gray-700 items-center dark:text-gray-400">
            <inertia-link :href="route('productos.index')"
              >Productos</inertia-link
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
            <div class="text-teal-400">Crear</div>
          </li>
        </ul>

        <form @submit.prevent="submit">
          <div
            class="px-8 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <h2
              class="my-2 text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              Nuevo producto
            </h2>

            <div>
              <jet-label for="Nombre" value="Nombre" />
              <jet-input
                id="Nombrs"
                type="text"
                class="mt-1 block w-full"
                v-model="form.Nombre"
                placeholder="Nombre"
                autofocus="true"
                autocomplete="off"
              />
              <div
                v-if="errors.Nombre"
                class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
              >
                El nombre es requerido
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
              <div>
                <jet-label for="categoria" value="Categoría" />
           
                <select
                  class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                  v-model="form.categoria_id"
                >
                  <option
                    v-for="(categor, index) in categorias"
                    :key="index"
                    :value="categor.id"
                    >{{ categor.Nombre }}</option
                  >
                </select>
                <div
                  v-if="errors.categoria_id"
                  class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                >
                  La categoría es requerida
                </div>
              </div>

              <div>
                <jet-label for="UnidadMedida" value="Unidad de Medida" />

                <select
                  class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                  v-model="form.UnidadMedida"
                >
                  <option value="Unidad">Unidad</option>
                  <option value="Millar">Millar</option>
                  <option value="Metro Cúbico">Metro Cúbico</option>
                  <option value="Tonelada">Tonelada</option>
                </select>
                <div
                  v-if="errors.UnidadMedida"
                  class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                >
                  La unidad de medida es requerida
                </div>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Stock" value="Stock" />
                  <jet-input
                    id="Stock"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.Stock"
                    placeholder="0"
                    autofocus="true"
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.Stock"
                    class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                  >
                    El stock es requerido
                  </div>
                </div>
              </div>

              <div>
                <jet-label for="PrecioVenta" value="Precio" />
                <jet-input
                  id="PrecioVenta"
                  type="number"
                  step="0.00"
                  class="mt-1 block w-full"
                  v-model="form.PrecioVenta"
                  placeholder="0.00"
                  autocomplete="off"
                />
                <div
                  v-if="errors.PrecioVenta"
                  class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                >
                  El precio es requerido
                </div>
              </div>
            </div>
            <div class="grid grid-cols-1"></div>

            <h2 class="mt-6"></h2>
            <jet-button
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Guardar
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
    categorias: Array,
    errors: Object,
  },

  data() {
    return {
      form: {
        Nombre: null,
        categoria_id: null,
        Stock: null,
        UnidadMedida: null,
        PrecioVenta: null,
      },
    };
  },
  methods: {
    submit() {
      //console.log(this.form);
      this.$inertia.post(route("productos.store"), this.form);
    },
  },
};
</script>
