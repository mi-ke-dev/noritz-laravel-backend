<template>
    <div>
        <div>
            <form @submit.prevent="$emit('submitted')">
                <div class="p-5 pb-0">
                    <slot name="form"></slot>
                </div>

                <div v-if="hasActions" class="p-5 pt-0 flex justify-end">
                    <label class="md:w-1/4 w-full pr-4" for=""></label>
                    <div class="md:w-3/4 w-full">
                        <slot name="actions"></slot>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        emits: ['submitted'],

        components: {

        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
