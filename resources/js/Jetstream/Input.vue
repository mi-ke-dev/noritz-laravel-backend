<template>
    <input class="focus:ring-blue-500 focus:border-blue-500 block w-full px-4 sm:text-sm border-2 border-gray-300 h-10 bg-gray-50" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

