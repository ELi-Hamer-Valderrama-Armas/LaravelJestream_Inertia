<template>
  <jet-form-section @submitted="updatePassword">
    <template #title>
      <div class="dark:text-gray-400">
        Actualizar Contraseña
      </div>
    </template>

    <template #description>
      <div class="dark:text-gray-400">
        Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria
        para mantenerse seguro
      </div>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="current_password" value="Contraseña Actual" />
        <jet-input
          id="current_password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.current_password"
          ref="current_password"
          autocomplete="current-password"
           placeholder="******"
         
        />
        <jet-input-error :message="form.errors.current_password" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <jet-label for="password" value="Nueva Contraseña" />
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          ref="password"
          autocomplete="new-password"
          placeholder="******"
        />
        <jet-input-error :message="form.errors.password" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <jet-label for="password_confirmation" value="Confirmar Contraseña" />
        <jet-input
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          autocomplete="new-password"
          placeholder="******"
        />
        <jet-input-error
          :message="form.errors.password_confirmation"
          class="mt-2"
        />
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful" class="mr-3">
        Guardar.
      </jet-action-message>

      <jet-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Guardar
      </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";

export default {
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
  },

  data() {
    return {
      form: this.$inertia.form({
        current_password: "",
        password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    updatePassword() {
      this.form.put(route("user-password.update"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
        onError: () => {
          if (this.form.errors.password) {
            this.form.reset("password", "password_confirmation");
            this.$refs.password.focus();
          }

          if (this.form.errors.current_password) {
            this.form.reset("current_password");
            this.$refs.current_password.focus();
          }
        },
      });
    },
  },
};
</script>
