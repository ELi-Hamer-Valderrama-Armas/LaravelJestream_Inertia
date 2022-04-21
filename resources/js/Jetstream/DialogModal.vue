<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 dark:bg-gray-800">
            <div class="text-lg dark:text-gray-300">
                <slot name="title">
                </slot>
            </div>

            <div class="mt-4 dark:text-gray-400">
                <slot name="content">
                </slot>
            </div>
        </div>

        <div class="flex flex-col justify-end px-6 py-4 bg-gray-100 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row text-right bg-gray-50 dark:bg-gray-700">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
    import Modal from './Modal'

    export default {
        emits: ['close'],

        components: {
            Modal,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
