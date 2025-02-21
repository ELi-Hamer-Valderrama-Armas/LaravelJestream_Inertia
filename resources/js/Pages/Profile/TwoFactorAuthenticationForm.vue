<template>
    <jet-action-section>
        <template #title>
            <div class="dark:text-gray-300">
            Autenticación de dos factores
            </div>
        </template>

        <template #description>
            <div class="dark:text-gray-300">
            Agregue seguridad adicional a su cuenta mediante la autenticación de dos factores.
            </div>
        </template>

        <template #content>
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300" v-if="twoFactorEnabled">
                <div class="text-gray-900 dark:text-gray-300">
                Ha habilitado la autenticación de dos factores.
                </div>
            </h3>

            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300" v-else>
                
                No ha habilitado la autenticación de dos factores.
                
            </h3>

            <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-gray-300 ">
                
                <p >
                    Cuando la autenticación de dos factores está habilitada, se le solicitará un token aleatorio seguro durante la autenticación. Puede recuperar este token de la aplicación Autenticador de Google de su teléfono.
                </p>
                
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                        
                             <p class="font-semibold dark:text-gray-300">
                           
                            La autenticación de dos factores ahora está habilitada. Escanee el siguiente código QR usando la aplicación de autenticación de su teléfono.
                            
                        </p>
                        
                    </div>

                    <div class="mt-4 dark:p-4 dark:w-56 dark:text-gray-300 dark:bg-gray-800" v-html="qrCode">
                    </div>
                </div>

                <div v-if="recoveryCodes.length > 0">
                    <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                        <div class="dark:text-gray-300">
                        <p class="font-semibold">
                            
Guarde estos códigos de recuperación en un administrador de contraseñas seguro. Se pueden usar para recuperar el acceso a su cuenta si pierde su dispositivo de autenticación de dos factores.
                        </p>
                        </div>
                    </div>

                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg dark:text-gray-300 dark:bg-gray-800">
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="! twoFactorEnabled">
                    <jet-confirms-password @confirmed="enableTwoFactorAuthentication">
                        <jet-button type="button" :class="{ 'opacity-25': enabling }" :disabled="enabling">
                            Permitir
                        </jet-button>
                    </jet-confirms-password>
                </div>

                <div v-else>
                    <jet-confirms-password @confirmed="regenerateRecoveryCodes">
                        <jet-secondary-button class="mr-3 bg-green-400 border border-green-400 hover:text-white text-gray-100"
                                        v-if="recoveryCodes.length > 0">
                           Regenerar códigos de recuperación
                        </jet-secondary-button>
                    </jet-confirms-password>

                    <jet-confirms-password @confirmed="showRecoveryCodes">
                        <jet-secondary-button class="mr-3 bg-green-400 border border-green-400 hover:text-white text-gray-100" v-if="recoveryCodes.length === 0">
                           Mostrar códigos de recuperación
                        </jet-secondary-button>
                    </jet-confirms-password>

                    <jet-confirms-password @confirmed="disableTwoFactorAuthentication">
                        <jet-danger-button
                                        :class="{ 'opacity-25': disabling }"
                                        :disabled="disabling">
                            Desactivar
                        </jet-danger-button>
                    </jet-confirms-password>
                </div>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetButton from '@/Jetstream/Button'
    import JetConfirmsPassword from '@/Jetstream/ConfirmsPassword'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionSection,
            JetButton,
            JetConfirmsPassword,
            JetDangerButton,
            JetSecondaryButton,
        },

        data() {
            return {
                enabling: false,
                disabling: false,

                qrCode: null,
                recoveryCodes: [],
            }
        },

        methods: {
            enableTwoFactorAuthentication() {
                this.enabling = true

                this.$inertia.post('/user/two-factor-authentication', {}, {
                    preserveScroll: true,
                    onSuccess: () => Promise.all([
                        this.showQrCode(),
                        this.showRecoveryCodes(),
                    ]),
                    onFinish: () => (this.enabling = false),
                })
            },

            showQrCode() {
                return axios.get('/user/two-factor-qr-code')
                        .then(response => {
                            this.qrCode = response.data.svg
                        })
            },

            showRecoveryCodes() {
                return axios.get('/user/two-factor-recovery-codes')
                        .then(response => {
                            this.recoveryCodes = response.data
                        })
            },

            regenerateRecoveryCodes() {
                axios.post('/user/two-factor-recovery-codes')
                        .then(response => {
                            this.showRecoveryCodes()
                        })
            },

            disableTwoFactorAuthentication() {
                this.disabling = true

                this.$inertia.delete('/user/two-factor-authentication', {
                    preserveScroll: true,
                    onSuccess: () => (this.disabling = false),
                })
            },
        },

        computed: {
            twoFactorEnabled() {
                return ! this.enabling && this.$page.props.user.two_factor_enabled
            }
        }
    }
</script>
