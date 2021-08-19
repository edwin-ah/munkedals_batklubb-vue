<template>
    <div class="h-auto" :class="navBgClass">
        <nav class="py-1">
            <div class="xl:max-w-7xl max-w-full mx-auto sm:px-6 md:px-4 lg:px-2 xl:px-0">
                <div class="flex justify-between">
                    <!-- LOGO -->
                    <div class="flex">
                        <inertia-link :href="route('home')" class="group logo-link flex items-center text-white pt-1 focus:ring-2 focus:ring-gray-300">
                            <logo class="block h-14 w-auto" />
                            <h3 class="ml-1 font-bold text-lg uppercase leading-5 border-b-2 border-transparent group-hover:border-gray-300 transition duration-150 ease-in-out">munkedals båtklubb</h3>
                        </inertia-link>
                    </div>
                    <!-- NAVLINKS -->
                    <div class="items-center lg:space-x-3 space-x-1 uppercase hidden -mt-1" :class="navLinksClass">
                        <nav-link :href="route('home')" :active="route().current('home')"> 
                            Hem
                        </nav-link>
                        <nav-link :href="route('home')" :active="route().current('byt')"> 
                            Hamnområden
                        </nav-link>
                        <nav-link :href="route('home')" :active="route().current('byt')"> 
                            Information
                        </nav-link>
                        <nav-link :href="route('home')" :active="route().current('byt')"> 
                            Om oss
                        </nav-link>
                        <div v-if="$page.props.auth.user" class="lg:space-x-3 space-x-1 uppercase">
                            <!-- ADMIN LINKS -->
                            <nav-link :href="route('home')" :active="route().current('byt')">
                                Hantera Konto
                            </nav-link>
                            <nav-link :href="route('logout')" method="post" as="button" class="uppercase">
                                Logga ut
                            </nav-link>
                        </div>
                    </div>
                    <!-- HAMBURGER -->
                    <div class="mr-2 flex items-center" :class="hamburgerClass">
                        <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 bg-gray-700 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- DROP DOWN MENU -->
            <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="mobile-menu">
                <responsive-nav-link :href="route('home')" :active="route().current('home')"> 
                    Hem
                </responsive-nav-link>
                <responsive-nav-link :href="route('home')" :active="route().current('byt')"> 
                    Hamnområden
                </responsive-nav-link>
                <responsive-nav-link :href="route('home')" :active="route().current('byt')"> 
                    Information
                </responsive-nav-link>
                <responsive-nav-link :href="route('home')" :active="route().current('byt')"> 
                    Om oss
                </responsive-nav-link>
                <div v-if="$page.props.auth.user">
                    <!-- ADMIN LINKS -->
                    <responsive-nav-link :href="route('home')" :active="route().current('byt')">
                        Hantera Konto
                    </responsive-nav-link>
                    <responsive-nav-link :href="route('logout')" method="post" as="button" class="block">
                        Logga ut
                    </responsive-nav-link>
                </div>
            </div>
        </nav>

        <slot name="jumbotronStart"></slot>
    </div>
</template>

<script>
import { ref } from '@vue/reactivity'
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

import logo from '@/Components/Logo.vue'
import navLink from '@/Components/NavLink.vue'
import responsiveNavLink from '@/Components/ResponsiveNavLink.vue'


export default {
    components: { 
        logo,
        navLink,
        responsiveNavLink
    },
    setup() {
        const showingNavigationDropdown = ref(false)
        const navLinksClass = computed(() => {
            return usePage().props.value.auth.user ? 'lg:flex' : 'md:flex'
        })
        const hamburgerClass = computed(() => {
            return usePage().props.value.auth.user ? 'lg:hidden' : 'md:hidden'
        })

        const navBgClass = computed(() => {
            return route().current('home') ? 'navbar-background work-sans' : 'bg-main work-sans'
        })

        return { showingNavigationDropdown, navLinksClass, hamburgerClass, navBgClass }
    }
}
</script>

<style>
    .navbar-background {
        background: linear-gradient(rgba(95, 95, 95, 0.75), rgba(95, 95, 95, 0.25)), url("/images/web_images/ny-brygga.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    .mobile-menu {
        background: linear-gradient(rgba(48, 48, 48, 0.8), rgba(48, 48, 48, 0.8));
    }

    @media only screen and (min-width: 768px) {
    .navbar-background { 
        background: linear-gradient(rgba(39, 39, 39, 0.75), rgba(39, 39, 39, 0.25)), url("/images/web_images/ny-brygga-lg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        }
    }
</style>