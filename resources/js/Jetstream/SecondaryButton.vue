<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white  rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm  focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    }
</script>
