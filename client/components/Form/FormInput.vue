<template>
  <input
    class="form-input"
    :value="value"
    :placeholder="placeholder"
    @input="e => $emit('input', e.target.value)"
  />
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      default: null
    },
    placeholder: {
      type: String,
      default: null
    }
  }
}
</script>

<style lang="postcss" scoped>
.form-input {
  @apply mb-4 block rounded-md py-2 px-4 w-full bg-gray-100;
  box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
}

.form-input:focus {
  @apply outline-none shadow-outline;
}
</style>
