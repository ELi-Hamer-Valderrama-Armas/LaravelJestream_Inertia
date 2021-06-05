<template>
  <div>
    <app-layout>
      <div class="container px-6 mx-auto grid">
        <ul class="flex py-6 text-sm lg:text-base">
          <li class="inline-flex text-gray-700 items-center dark:text-gray-400">
            <inertia-link :href="route('proveedores.index')"
              >Proveedores</inertia-link
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
              class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Nuevo Proveedor
            </h2>

            <div class="grid grid-cols-1">
              <div>
                <jet-label for="Nombres" value="Nombres" />
                <jet-input
                  id="Nombres"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.Nombres"
                  placeholder="Apellidos y Nombres"
                  autofocus="true"
                  autocomplete="off"
                />
                <div
                  v-if="errors.Nombres"
                  class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                >
                  Los nombres son requerido
                </div>
              </div>
            </div>
  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
              <div class="grid grid-cols-1">
                 <div class="grid grid-cols-1">
              <div>
                <jet-label for="RazonSocial" value="RazonSocial" />
                <jet-input
                  id="RazonSocial"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.RazonSocial"
                  placeholder="Apellidos y Nombres"
                  autofocus="true"
                  autocomplete="off"
                />
                <div
                  v-if="errors.RazonSocial"
                  class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                >
                  La RazonSocial es requerido
                </div>
              </div>
            </div>
              </div>
              <div>
                <jet-label for="Tipo Documento" value="Tipo Documento" />

                <select
                  class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                  v-model="form.TipoDocumento"
                >
                  <option value="Dni">Dni</option>
                  <option value="Ruc">Ruc</option>
                </select>
                <div
                  v-if="errors.TipoDocumento"
                  class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                >
                  El tipo de documento es requerido
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Numero Documento" value="Numero Documento" />
                  <jet-input
                    id="NumeroDocumento"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.NumeroDocumento"
                    placeholder="Dni/Ruc"
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.NumeroDocumento"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El numero de documento es requerido
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Telefono" value="Teléfono" />
                  <jet-input
                    id="Telefono"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.Telefono"
                    placeholder="Numero Teléfono"
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.Telefono"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El teléfono es requerido
                  </div>
                </div>
              </div>
            </div>
            <div>
              <jet-label for="Email" value="Email" />
              <jet-input
                id="Email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.Email"
                placeholder="Email@..."
                autofocus="true"
              />
              <div
                v-if="errors.Email"
                class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
              >
                El email es requerido
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
              
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Ciudad" value="Ciudad" />
                  <jet-input
                    id="Ciudad"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Ciudad"
                    placeholder="Nombres Ciudad"
                    autofocus="true"
                    autocomplete="off"
                  />
                </div>
              </div>            

              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Calle" value="Calle" />
                  <jet-input
                    id="Calle"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Calle"
                    placeholder="Nombre Calle"
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.Calle"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    La calle es requerida
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Numero" value="Numero" />
                  <jet-input
                    id="Numero"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.Numero"
                    placeholder="Numero"
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.Numero"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El numero es requerido
                  </div>
                </div>
              </div>
            </div>

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
    errors: Object,
  },

  data() {
    return {
      form: {
        TipoPersona:'Proveedor',
        RazonSocial:null,
        TipoDocumento:null,
        NumeroDocumento:null,
        Nombres: null,
        Telefono:null,
        Email:null,
        Ciudad:null,
        Calle:null,
        Numero: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route("proveedores.store"), this.form);
    },
  },
};
</script>