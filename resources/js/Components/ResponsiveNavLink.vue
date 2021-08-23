<template>
    <inertia-link :class="classes">
        <slot />
    </inertia-link>
</template>

<script>
    export default {
        props: ['active'],

        computed: {
            classes() {
                return this.active
                            ? 'block pl-3 pr-4 py-2 border-l-4 border-white text-base font-medium text-white bg-transparent transition duration-150 ease-in-out'
                            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white bg-transparent hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out'
            }
        }
    }
</script>
