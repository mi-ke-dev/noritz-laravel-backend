<template>
    <div class="">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
            <template #buttons><slot name="buttons"></slot></template>
        </jet-section-title>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="py-6 px-8 bg-white">
                        <div class="">
                            <slot name="form"></slot>
                        </div>
                    </div>
                </div>                

                <div class="flex items-center justify-end mt-8" v-if="hasActions">
                    <slot name="actions"></slot>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    import JetSectionTitle from './SectionTitle'

    export default {
        components: {
            JetSectionTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
