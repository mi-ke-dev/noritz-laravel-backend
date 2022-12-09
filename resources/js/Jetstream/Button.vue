<template>
    <button :type="type" class="bg-red-600 border border-red-600 rounded-full text-white font-bold px-8 py-2 hover:bg-transparent hover:text-red-600 focus:outline-none uppercase">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
