<template>
  <label class="form-label">
    <slot />
    <small v-if="errors && errors.length" class="text-red-700">
      {{ errors.join(', ') }}
    </small>
  </label>
</template>

<script>
export default {
  props: {
    errors: {
      type: Array,
      default: () => []
    }
  }
}
</script>

<style lang="postcss" scoped>
.form-label {
  @apply text-gray-800 block mb-1;
}
</style>
