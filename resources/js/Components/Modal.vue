<template>
  <div class="pt-24 h-screen w-screen shadow fixed left-0 top-0 z-10 overflow-auto bg-black bg-opacity-40" @click.self="closeModal">
    <div class="w-full max-w-sm mx-auto">
      <button @click="closeModal" class="float-right text-gray-700 text-xl font-bold bg-white mr-4 hover:text-black focus:text-black">
          <span>&times;</span>
      </button>
      <slot name="modalContent"></slot>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    closeModal() {
      this.$emit('close')
    }
  }
}
</script>

<style>

</style>