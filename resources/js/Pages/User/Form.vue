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
              Nuevo usuario
            </h2>

            <div class="grid grid-cols-1">
              <div>
                <jet-label for="Nombres" value="Nombres" />
                <jet-input
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
                  placeholder="Apellidos y Nombres"
                  autocomplete="off"
                />
                <div
                  v-if="errors.name"
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
                    <jet-label
                      for="NumeroDocumento"
                      value="Dni"
                    />
                    <jet-input
                      id="NumeroDocumento"
                      type="number"
                      class="mt-1 block w-full"
                      v-model="form.NumeroDocumento"
                      placeholder="00000000"
                      autocomplete="off"
                    />
                    <div
                      v-if="errors.NumeroDocumento"
                      class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                    >
                      El dni es requerido
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <jet-label for="Telefono" value="Teléfono" />
                <jet-input
                  id="Telefono"
                  type="number"
                  class="mt-1 block w-full"
                  v-model="form.Telefono"
                  placeholder="000 000 000"
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

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Ciudad" value="Ciudad" />
                  <jet-input
                    id="Ciudad"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Ciudad"
                    placeholder="Nombre"
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.Ciudad"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    La ciudad es requerida
                  </div>
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
                    placeholder="Nombre"
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
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Numero" value="Número" />
                  <jet-input
                    id="Numero"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.Numero"
                    placeholder="000"
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
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Role" value="Típo de Rol" />

                  <select
                    class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                    v-model="form.Role"
                  >
                    <option value="Administrador">
                      Administrador
                    </option>
                    <option value="Usuario">Usuario</option>
                  </select>
                  <div
                    v-if="errors.Role"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El rol es requerido
                  </div>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Email" value="Email" />
                  <jet-input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    placeholder="Email@..."
                    autocomplete="off"
                  />
                  <div
                    v-if="errors.email"
                    class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                  >
                    El email es requerido y/o Email ya existe
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="password" value="Contraseña" />
                  <jet-input
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    placeholder="******"
                    autocomplete="new-password"
                  />
                  <div
                    v-if="errors.password"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    La contraseña es requerida
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1">
                <div>
                  <jet-label
                    for="confirmarPassword"
                    value="Confirmar Contraseña"
                  />
                  <jet-input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    placeholder="******"
                    autocomplete="new-password"
                  />
                  
                   <div
                    v-if="errors.password_confirmation"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                   La contraseña no coincide
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
        name: null,
        email: null,
        NumeroDocumento: null,
        Telefono: null,
        Ciudad: null,
        Calle: null,
        Numero: null,
        Role: null,
        password: null,
        password_confirmation: null,
      },
    };
  },
  methods: {
    submit() {

    this.$inertia.post(route("usuarios.store"), this.form);
  
  },
  },
 
};
</script>
