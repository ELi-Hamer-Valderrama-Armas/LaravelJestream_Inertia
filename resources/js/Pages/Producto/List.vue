<template>
  <div>
    <app-layout>
      <div class="container px-6 grid py-8 px-2 mx-auto">
        <div
          class="px-2 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
          <h2
            class="py-2 px-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Productos
          </h2>

          <div
            class="grid px-6 py-3 bg-white text-xs font-semibold tracking-wide text-gray-500 uppercase dark:border-gray-700 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
          >
            <span class="flex px-2 items-center col-span-4">
              <nav aria-label="Table navigation">
                <inertia-link
                  :href="route('productos.create')"
                  class="px-4 py-2 leading-5 inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:ring focus:ring-purple-300 disabled:opacity-25 transition"
                >
                  Nuevo
                </inertia-link>
              </nav>
            </span>
            <span class="col-span-1"></span>
            <!-- buscar -->
            <span class="flex col-span-4 py-2 mt-2 sm:mt-auto sm:justify-end">
              <div
                class="relative w-full px-2 max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>

               
              </div>
            </span>
          </div>

          <div class="flex flex-col grid py-2 px-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div
                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
              >
                <div
                  class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg dark:border-gray-700 dark:divide-gray-700"
                >
                  <table
                    class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                  >
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-bdark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-700"
                      >
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">NOMBRE</th>
                        <th class="px-4 py-3">CATEGORIA</th>
                        <th class="px-4 py-3">STOCK</th>
                        <th class="px-4 py-3">UNIDAD MEDIDA</th>
                        <th class="px-4 py-3">PRECIO VENTA</th>
                        <th class="px-4 py-3">ACCION</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                      <tr
                        v-for="(producto, index) in productos.data"
                        :key="index"
                        class="text-gray-700 dark:text-gray-400"
                      >
                        <td class="px-4 py-3 text-sm">
                          {{ index + 1 }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ producto.Nombre }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{producto.categorias.Nombre}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ producto.Stock }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ producto.UnidadMedida }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                          {{ producto.PrecioVenta }}
                        </td>

                        <td
                          class="px-6 py-1 whitespace-nowrap text-sm text-gray-500"
                        >
                          <div class="flex items-center space-x-4 text-sm">
                            <inertia-link
                              :href="route('productos.edit', producto.id)"
                              as="button"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                              </svg>
                            </inertia-link>
                            <button
                              @click="deleteRow(producto)"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </button>
                          </div>
                        </td>
                      </tr>

                      <tr v-if="productos.data.length === 0">
                        <td class="px-4 py-3 text-sm" colspan="9">
                          <p
                            class="text-sm text-center text-gray-700 dark:text-gray-300"
                          >
                            No existen productos.
                          </p>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <jet-pagination :links="productos.links" />

                  <jet-confirmation-modal :show="isOpen" @click="closeModal">
                    <template #title> Eliminar área </template>

                    <template #content>
                      Si eliminas este productos también se eliminaran de las
                      entradas y salidas que le pertenecen. ¿Esta seguro de
                      Eliminar este Producto?.
                    </template>

                    <template #footer>
                      <button
                        @click="closeModal"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                      >
                        Cancelar
                      </button>
                      <inertia-link
                        class="w-full px-5 text-center py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        method="delete"
                        :href="route('productos.destroy', datos)"
                        @click="closeModal"
                      >
                        Eliminar
                      </inertia-link>
                    </template>
                  </jet-confirmation-modal>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </app-layout>
  </div>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetInput from "@/Jetstream/Input";
import JetPagination from "@/Jetstream/Pagination";
import throttle from "lodash/throttle";

export default {
  props: {
    productos: Array,
  },
  components: {
    AppLayout,
    JetConfirmationModal,
    JetSecondaryButton,
    JetDangerButton,
    JetInput,
    JetPagination,
  },

  data() {
    return {
      isOpen: false,
      datos: null,

      params: {
        buscar: null,
      },
    };
  },

  watch: {
    params: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(route("productos.index"), this.params, {
          preserveState: true,
        });
      }, 150),
    },
  },
  methods: {
    openModal() {
      this.isOpen = true;
    },

    closeModal() {
      this.isOpen = false;
      console.log(this.isOpen);
    },
    deleteRow(datas) {
      this.datos = datas.id;
      this.openModal();
    },
  },
};
</script>
