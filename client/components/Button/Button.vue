<template>
  <button class="button" :class="`button-${variant}`" @click="$emit('click')">
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    variant: {
      type: String,
      default: 'default'
    }
  }
}
</script>

<style lang="postcss" scoped>
.button {
  @apply py-2 px-4 rounded-md shadow-md;
}

.button.button-default {
  @apply bg-teal-100;
}

.button.button-cta {
  @apply bg-teal-500 text-teal-100;
}

.button:focus {
  @apply outline-none shadow-outline;
}

.button:disabled {
  opacity: 0.5;
}
</style>
