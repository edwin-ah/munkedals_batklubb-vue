<template>
    <home-layout>
        <div class="bg-main">
            <div class="container mx-auto">
                <div class="flex flex-wrap justify-center items-center text-white">
                    <p class="sm:w-9/12 md:w-6/12 lg:w-3/12 px-5 md:px-0">
                        Denna välordnade båtklubb ligger i anslutning till Göta Älv strax norr om Stallbackabron.
                        <br><br>
                        Vi bedriver vinterförvaring av både segel, motorbåtar och trailer-båtar. Klubbområdet omfattar en yta av ca. 17000 m2 med egen hamn och erbjuder vinterförvaring av förnärvarande ca 300 stycken båtar.  Klubben tillhandahåller service till medlemmarna i form av..
                    </p>
                    <inertia-link :href="route('home')" class="px-10 py-2 rounded bg-blue-500 md:ml-10 hover:bg-blue-600 focus:bg-blue-600">
                        Läs mer om oss
                    </inertia-link>
                </div>
            </div>
        </div>
    <div class="wave-holder-bottom h-40"></div>

    <div class="container mx-auto">
        <div class="flex flex-col justify-between md:flex-row">
            <div class="text-center p-5">
                <h2 class="text-xl text-gray-900 font-semibold md:text-2xl">Semesterstängt {{ holidayClosed.year }}</h2>
                <h4 class="text-xl">Vecka {{ holidayClosed.startWeek }}-{{ holidayClosed.endWeek }}</h4>
                <p class="bp-2">
                    Vid akuta ärenden kontakta 
                    <inertia-link :href="route('home')" class="text-blue-900 hover:underline focus:underline">
                        styrelsen
                    </inertia-link>
                </p>
                <button v-if="$page.props.auth.user" @click="showModal = !showModal" class="rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600 focus:outline-none">Ändra</button>
            </div>

            <div class="text-center p-5">
                <h2 class="text-xl text-gray-900 font-semibold md:text-2xl">Mer information om oss?</h2>
                <ul>
                    <li>
                        <a href="#" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Våra hamnområden</a>
                    </li>
                    <li>
                        <a href="#" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Informationsblad</a>
                    </li>
                    <li>
                        <a href="#" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Avgifter</a>
                    </li> 
                    <li>
                        <a href="#" class="text-blue-900 text-lg md:text-xl rounded hover:underline hover:text-blue-darker focus:underline">Bildarkivet</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="text-center">
                <h1 class="md:text-2xl text-xl text-gray-900 font-bold mb-3">Är du medlem?</h1>
                <a href="#" class="btn-primary text-lg px-5 py-3 rounded-lg shadow-2xl">Fyll i dina båtuppgifter här</a>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <modal v-if="showModal" @close="showModal = !showModal">
        <template #modalContent>
            <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"> 
                <div class="mb-4">
                    <label class="block text-gray-500 font-bold mb-2" for="year">Ange år</label>
                    <input type="number" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" :class="{ 'border-red-400': errors.year }" id="year" name="year" v-model="form.year">
                    <div v-if="errors.year" class="text-red-500">{{ errors.year }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-500 font-bold mb-2" for="startWeek">Från och med vecka</label>
                    <input type="number" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" :class="{ 'border-red-400': errors.startWeek }" id="startWeek" name="startWeek" v-model="form.startWeek">
                    <div v-if="errors.startWeek" class="text-red-500">{{ errors.startWeek }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-500 font-bold mb-2" for="endWeek">Till och med vecka</label>
                    <input type="number" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" :class="{ 'border-red-400': errors.endWeek }" id="endWeek" name="endWeek" v-model="form.endWeek">
                    <div v-if="errors.endWeek" class="text-red-500">{{ errors.endWeek }}</div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="rounded bg-green-500 text-white px-5 py-2 shadow hover:bg-green-600 focus:bg-green-600 focus:outline-none">Ändra</button>
                </div>
            </form>
        </template>
    </modal>

    </home-layout>
</template>

<script>
import { reactive, ref } from '@vue/reactivity'
import { Inertia } from '@inertiajs/inertia'
import homeLayout from '@/Layouts/HomeLayout.vue'
import modal from '@/Components/Modal.vue'

export default {
    metaInfo: { title: 'Hem' },
    props: {
        errors: Object,
        holidayClosed: Object
    },
    components: {
        Head,
        homeLayout,
        modal
    },
    setup(props) {
        const showModal = ref(false)
        
        const form = reactive({
            id: props.holidayClosed.id,
            year: props.holidayClosed.year,
            startWeek: props.holidayClosed.startWeek,
            endWeek: props.holidayClosed.endWeek
        })

        function submit() {
            Inertia.post('/', form, {
                onSuccess: () => showModal.value = false
            })
        }

        return { showModal, form, submit }
    }
}
</script>

<style>

</style>