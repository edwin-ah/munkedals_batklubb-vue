<template>
  <app-head title="Information" />
  <main-layout>
    <div>
      <div class="container mx-auto mt-5">
        <h1 class="text-center text-4xl font-semibold text-main work-sans">Information</h1>
        <div class="bg-white rounded shadow-xl">
            <p class="text-center py-5">
                Munkedals båtklubb bildades den 14 november år 1937.
                Vi är cirka 700 medlemmar med cirka 245 båtplatser och omkring 140 uppläggningsplatser.
            </p>
            <p class="text-center">Läs våra medlemsmötes protokoll <a class="uppercase underline text-main" href="#">HÄR</a></p>

            <div class="flex md:flex-row justify-between flex-col py-3 md:py-8">
                <div class="md:w-6/12 sm:mb-5 lg:px-20 px-10 flex flex-col justify-center">
                    <h2 class="text-center text-2xl font-semibold text-main work-sans">Informationsblad</h2>
                    <ul>
                        <li v-for="information in informationSheets" :key="information.id">
                           {{ information.title }} <a class="uppercase underline text-main" :href="'uploads/pdfs/' + information.pdfName" target="_blank" rel="noopener noreferrer">HÄR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main-layout>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue'
import AppHead from '@/Components/AppHead.vue'
export default {
  components: { MainLayout, AppHead },
  props: {
    informationSheets: Object
  }

}
</script>

<style>

</style>