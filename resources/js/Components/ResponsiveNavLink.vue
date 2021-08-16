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
                            ? 'block pl-3 pr-4 py-2 border-l-4 border-white text-base font-medium text-white bg-gray-700 focus:outline-none focus:text-black focus:bg-indigo-50 focus:border-blue-500 transition duration-150 ease-in-out'
                            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-gray-800 hover:bg-gray-200 hover:border-gray-500 focus:outline-none focus:text-gray-800 focus:bg-gray-300 focus:border-gray-300 transition duration-150 ease-in-out'
            }
        }
    }
</script>
