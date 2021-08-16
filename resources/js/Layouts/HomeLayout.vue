<template>
  <mbk-navbar>
    <template #jumbotronStart>
      <div class="wave-holder-top h-40 flex">
          <div class="container mx-auto align-text-bottom text-center">
            <h1 class="lg:text-4xl text-2xl text-white mb-5 font-bold">Välkommen Till Munkedals Båtklubb</h1>
          </div>
      </div>  
    </template>
  </mbk-navbar>
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
  }
}
</script>

<style>
  .wave-holder-top {
      margin-top: 10rem;
      background: url("/images/web_images/waveTop.svg");
      background-repeat: no-repeat;
      background-size: contain;
      align-items: flex-end;
  }

  .wave-holder-bottom {
      background: url("/images/web_images/waveBottom.svg");
      background-repeat: no-repeat;
      background-size: contain;
      align-items: flex-end;
  }
</style>