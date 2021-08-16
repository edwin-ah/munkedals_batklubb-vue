<template>
    <mbk-navbar />
    <!-- Page Content -->
    <main>
        <slot />
    </main>
    <mbk-footer />
</template>

<script>
import mbkNavbar from '@/Components/Navbar.vue'
import mbkFooter from '@/Components/Footer.vue'
export default {
    components: {
        mbkNavbar,
        mbkFooter
    },
}
</script>

<style>

</style>