<template>
    <inertia-link :href="href" :class="classes">
        <slot />
    </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-white text-sm font-medium leading-5 text-white transition duration-150 ease-in-out'
                            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out'
            }
        }
    }
</script>
