<template>
  <div>
    <label v-if="label" :for="inputId"  class="block text-gray-500 font-bold mb-2" >{{ label }}</label>
    <input :type="type" :id="inputId" :name="inputName" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :class="[{ 'border-red-400': error }, boxModel ]" class="appearance-none border-2 border-gray-200 rounded text-gray-700 leading-tight focus:outline-none focus:bg-white">
    <div v-if="error" class="text-red-500">{{ error }}</div>
  </div>
</template>

<script>
export default {
  emits: ['update:modelValue'],
  
  props: {
    inputId: String,
    type: {
      type: String,
      default: 'text'
    },
    modelValue: [String, Number],
    label: String,
    error: String,
    inputName: String,
    boxModel: String,
  }
}
</script>