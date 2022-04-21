<template>
  <jet-form-section @submitted="updateProfileInformation">
    <template #title>
      <div class="dark:text-gray-400">
        Información de Perfil
      </div>
    </template>

    <template #description>
      <div class="dark:text-gray-400">
        Actualice la información de perfil y la dirección de correo electrónico
        de su cuenta.
      </div>
    </template>

    <template #form>
      <!-- Profile Photo -->
      <div
        class="col-span-6 sm:col-span-4"
        v-if="$page.props.jetstream.managesProfilePhotos"
      >
        <!-- Profile Photo File Input -->
        <input
          type="file"
          class="hidden"
          ref="photo"
          @change="updatePhotoPreview"
        />

        <jet-label for="Foto" value="Foto" />

        <!-- Current Profile Photo -->
        <div class="mt-2" v-show="!photoPreview">
          <img
            :src="user.profile_photo_url"
            :alt="user.name"
            class="rounded-full h-20 w-20 object-cover"
          />
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" v-show="photoPreview">
          <span
            class="block rounded-full w-20 h-20"
            :style="
              'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
              photoPreview +
              '\');'
            "
          >
          </span>
        </div>

        <jet-secondary-button
          class="mt-2 mr-2 bg-green-400 border border-green-400 hover:text-white text-gray-100"
          type="button"
          @click.prevent="selectNewPhoto"
        >
          Seleccione Nueva Foto
        </jet-secondary-button>

        <jet-secondary-button
          type="button"
          class="mt-2 bg-red-400 hover:text-white text-gray-200 border border-red-400"
          @click.prevent="deletePhoto"
          v-if="user.profile_photo_path"
        >
          Eliminar Foto
        </jet-secondary-button>

        <jet-input-error :message="form.errors.photo" class="mt-2" />
      </div>

      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="name" value="Nombres" />
        <jet-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          placeholder="Apellidos y Nombres"
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.name" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="NumeroDocumento" value="Dni" />
        <jet-input
          id="NumeroDocumento"
          type="number"
          class="mt-1 block w-full"
          v-model="form.NumeroDocumento"
          placeholder="00000000"
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.NumeroDocumento" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="Telefono" value="Telefono" />
        <jet-input
          id="Telefono"
          type="number"
          class="mt-1 block w-full"
          v-model="form.Telefono"
          placeholder="000 000 000"
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.Telefono" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="Ciudad" value="Ciudad" />
        <jet-input
          id="Ciudad"
          type="text"
          class="mt-1 block w-full"
          v-model="form.Ciudad"
          placeholder="Nombre"
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.Ciudad" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="Calle" value="Calle" />
        <jet-input
          id="Calle"
          type="text"
          class="mt-1 block w-full"
          v-model="form.Calle"
           placeholder="Nombre"
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.Calle" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="Telefono" value="Número" />
        <jet-input
          id="Numero"
          type="number"
          class="mt-1 block w-full"
          v-model="form.Numero"
           placeholder="000"
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.Numero" class="mt-2" />
      </div>
      <!-- Email -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="email" value="Email" />
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
           placeholder="Email@..."
          autocomplete="off"
        />
        <jet-input-error :message="form.errors.email" class="mt-2" />
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
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },

  props: ["user"],

  data() {
    return {
      form: this.$inertia.form({
        _method: "PUT",
        name: this.user.name,
        email: this.user.email,
        NumeroDocumento: this.user.NumeroDocumento,
        Telefono: this.user.Telefono,
        Ciudad: this.user.Ciudad,
        Calle: this.user.Calle,
        Numero: this.user.Numero,
        photo: null,
      }),

      photoPreview: null,
    };
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }

      this.form.post(route("user-profile-information.update"), {
        errorBag: "updateProfileInformation",
        preserveScroll: true,
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    },

    deletePhoto() {
      this.$inertia.delete(route("current-user-photo.destroy"), {
        preserveScroll: true,
        onSuccess: () => (this.photoPreview = null),
      });
    },
  },
};
</script>
