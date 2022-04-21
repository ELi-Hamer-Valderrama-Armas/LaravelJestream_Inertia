<template>
    <div v-if="hasErrors" class="items-center p-2 bg-red-400 border border-red-400 rounded-md bg-white text-red-100">
        <div class=" m-1 font-medium flex justify-center ">¡Ups! Algo salió mal.</div>

        <ul class="mt-3 list-disc list-inside text-sm ">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
