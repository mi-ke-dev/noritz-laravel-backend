<template>
    <div>
        <button :class="classes" class="w-full text-left" v-if="as == 'button'">
            <slot></slot>
        </button>

        <inertia-link :href="href" :class="classes" v-else>
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
    export default {
        props: ['active', 'href', 'as', 'add_class', 'activeClass'],

        computed: {
            classes() {
                return this.active
                            ? this.add_class+' '+this.activeClass
                            : this.add_class
            }
        }
    }
</script>
