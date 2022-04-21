<template>
  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
      <div>
        <jet-label for="name" value="Name" />
        <jet-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />
      </div>
      <div>
        <jet-label for="NumeroDocumento" value="Dni" />
        <jet-input
          id="NumeroDocumento"
          type="number"
          class="mt-1 block w-full"
          v-model="form.NumeroDocumento"
          required
        />
      </div>
      <div>
        <jet-label for="Telefono" value="Telefono" />
        <jet-input
          id="Telefono"
          type="number"
          class="mt-1 block w-full"
          v-model="form.Telefono"
        />
      </div>
      <div>
        <jet-label for="Ciudad" value="Ciudad" />
        <jet-input
          id="Ciudad"
          type="text"
          class="mt-1 block w-full"
          v-model="form.Ciudad"
        />
      </div>
      <div>
        <jet-label for="Calle" value="Calle" />
        <jet-input
          id="Calle"
          type="text"
          class="mt-1 block w-full"
          v-model="form.Calle"
        />
      </div>
       <div>
        <jet-label for="Numero" value="Numero" />
        <jet-input
          id="Numero"
          type="text"
          class="mt-1 block w-full"
          v-model="form.Numero"
        />
      </div>
       <div>
              <jet-label for="role" value="Tipo de Rol" />

              <select
                class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                v-model="form.Role"
              >
                <option value="Administrador">
                  Administrador
                </option>
                <option value="Usuario">Usuario</option>
              </select>
             
            </div>

      <div class="mt-4">
        <jet-label for="email" value="Email" />
        <jet-input id="email" type="email" v-model="form.email" required />
      </div>
      <div class="mt-4">
        <jet-label for="password" value="Password" />
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
      </div>

      <div class="mt-4">
        <jet-label for="password_confirmation" value="Confirm Password" />
        <jet-input
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
      </div>

      <div
        class="mt-4"
        v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
      >
        <jet-label for="terms">
          <div class="flex items-center">
            <jet-checkbox
              name="terms"
              id="terms"
              v-model:checked="form.terms"
            />

            <div class="ml-2">
              Estoy de acuerdo con la
              <a
                target="_blank"
                :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Terms of Service</a
              >
              y
              <a
                target="_blank"
                :href="route('policy.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Política de privacidad</a
              >
            </div>
          </div>
        </jet-label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <inertia-link
          :href="route('login')"
          class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-300"
        >
          ¿Ya registrado?
        </inertia-link>

        <jet-button
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Registrar
        </jet-button>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
  },

  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        NumeroDocumento:"",
                Telefono:"",
                Ciudad:"",
                Calle:"",
              Numero:"",
                Role:"",

        terms: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
