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
              class="my-2 text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              Editar rol de usuario
            </h2>
              <div>
              <jet-label for="role" value="Típo de Rol" />

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
            <div class="grid grid-cols-1">
              <div>
                <jet-label for="Nombres" value="Nombres" />
                <jet-input-disable
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
                  placeholder="Apellidos y Nombres"
                  disabled
                />
                <div
                  v-if="errors.name"
                  class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                >
                  Los nombres son requerido
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Numero Documento" value="Dni" />
                  <jet-input-disable
                    id="NumeroDocumento"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.NumeroDocumento"
                    placeholder="00000000"
                    autocomplete="off"
                    disabled
                  />
                  <div
                    v-if="errors.NumeroDocumento"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El dni es requerido
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Telefono" value="Teléfono" />
                  <jet-input-disable
                    id="Telefono"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.Telefono"
                    placeholder="000 000 000"
                    disabled
                  />
                  <div
                    v-if="errors.Telefono"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El teléfono es requerido
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1">
                <div>
                  <jet-label for="Email" value="Email" />
                  <jet-input-disable
                    id="email"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    placeholder="Email@..."
                    disabled
                  />
                  <div
                    v-if="errors.email"
                    class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                  >
                    El email es requerido
                  </div>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
              <div class="grid grid-cols-1">
              <div>
                  <jet-label for="Ciudad" value="Ciudad" />
                  <jet-input-disable
                    id="Ciudad"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Ciudad"
                    placeholder="Nombre"
                    autofocus="true"
                    disabled
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
                  <jet-input-disable
                    id="Calle"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.Calle"
                    placeholder="Nombre"
                    autocomplete="off"
                    disabled
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
                  <jet-label for="Numero" value="Número" />
                  <jet-input-disable
                    id="Numero"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.Numero"
                    placeholder="000 000 000"
                    autocomplete="off"
                    disabled
                  />
                  <div
                    v-if="errors.Numero"
                    class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                  >
                    El número es requerido
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
import JetInputDisable from "@/Jetstream/InputDisable";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    JetLabel,
    JetInputDisable
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
        Role: JSON.parse(this.$props.usuarios).Role,
        NumeroDocumento: JSON.parse(this.$props.usuarios).NumeroDocumento,
        Telefono: JSON.parse(this.$props.usuarios).Telefono,
        Ciudad: JSON.parse(this.$props.usuarios).Ciudad,
        Calle: JSON.parse(this.$props.usuarios).Calle,
        Numero: JSON.parse(this.$props.usuarios).Numero,
      },
    };
  },
  methods: {
    submit() {
     
      this.$inertia.put(
        route("usuarios.update", JSON.parse(this.$props.usuarios).id),
        this.form
      );
    },
  },
};
</script>
