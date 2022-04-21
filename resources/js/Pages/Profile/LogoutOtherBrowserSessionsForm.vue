<template>
  <jet-action-section>
    <template #title>
      <div class="dark:text-gray-400">
        Sesiones del navegador
      </div>
    </template>

    <template #description>
      <div class="dark:text-gray-400">
        Administre y cierre la sesión de sus sesiones activas en otros
        navegadores y dispositivos.
      </div>
    </template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
        Si es necesario, puede cerrar la sesión de todas las demás sesiones de
        su navegador en todos sus dispositivos. Algunas de sus sesiones
        recientes se enumeran a continuación; sin embargo, esta lista puede no
        ser exhaustiva. Si cree que su cuenta se ha visto comprometida, también
        debe actualizar su contraseña.
      </div>

      <!-- Other Browser Sessions -->
      <div class="mt-5 space-y-6" v-if="sessions.length > 0">
        <div
          class="flex items-center"
          v-for="(session, i) in sessions"
          :key="i"
        >
          <div>
            <svg
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="w-8 h-8 text-gray-500"
              v-if="session.agent.is_desktop"
            >
              <path
                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
              ></path>
            </svg>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="w-8 h-8 text-gray-500"
              v-else
            >
              <path d="M0 0h24v24H0z" stroke="none"></path>
              <rect x="7" y="4" width="10" height="16" rx="1"></rect>
              <path d="M11 5h2M12 17v.01"></path>
            </svg>
          </div>

          <div class="ml-3">
            <div class="text-sm text-gray-600 dark:text-gray-400">
              {{ session.agent.platform }} - {{ session.agent.browser }}
            </div>

            <div>
              <div class="text-xs text-gray-500 dark:text-gray-400">
                {{ session.ip_address }},

                <span
                  class="text-green-500 font-semibold"
                  v-if="session.is_current_device"
                  >Este dispositivo</span
                >
                <span v-else>Last active {{ session.last_active }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex items-center mt-5">
        <jet-button @click="confirmLogout">
          Cerrar Sesión en Otros Navegadores
        </jet-button>

        <jet-action-message :on="form.recentlySuccessful" class="ml-3">
          Hecho.
        </jet-action-message>
      </div>

      <!-- Log Out Other Devices Confirmation Modal -->
      <jet-dialog-modal :show="confirmingLogout" @close="closeModal">
        <template #title>
          Cerrar Sesión en Otros Navegadores
        </template>

        <template #content>
          <div class="dark:text-gray-400">
            Ingrese su contraseña para confirmar que desea cerrar la sesión de
            sus otras sesiones de navegador en todos sus dispositivos.
          </div>
          <div class="mt-4">
            <jet-input
              type="password"
              class="mt-1 block w-3/4"
              placeholder="Contraseña"
              ref="password"
              v-model="form.password"
              @keyup.enter="logoutOtherBrowserSessions"
            />

            <jet-input-error :message="form.errors.password" class="mt-2" />
          </div>
        </template>

        <template #footer>
          <button
            @click="closeModal"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Cancelar
          </button>

          <button
            class="w-full px-5 text-center py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            @click="logoutOtherBrowserSessions"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Cerrar Sesión
          </button>
        </template>
      </jet-dialog-modal>
    </template>
  </jet-action-section>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetActionSection from "@/Jetstream/ActionSection";
import JetButton from "@/Jetstream/Button";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  props: ["sessions"],

  components: {
    JetActionMessage,
    JetActionSection,
    JetButton,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetSecondaryButton,
  },

  data() {
    return {
      confirmingLogout: false,

      form: this.$inertia.form({
        password: "",
      }),
    };
  },

  methods: {
    confirmLogout() {
      this.confirmingLogout = true;

      setTimeout(() => this.$refs.password.focus(), 250);
    },

    logoutOtherBrowserSessions() {
      this.form.delete(route("other-browser-sessions.destroy"), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
        onError: () => this.$refs.password.focus(),
        onFinish: () => this.form.reset(),
      });
    },

    closeModal() {
      this.confirmingLogout = false;

      this.form.reset();
    },
  },
};
</script>
