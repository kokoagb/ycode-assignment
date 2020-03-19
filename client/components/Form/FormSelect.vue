<template>
  <div class="inline-block relative w-64 mb-4">
    <select
      class="form-input"
      :value="value"
      @change="e => $emit('change', e.target.value)"
    >
      <slot />
    </select>
    <div
      class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
    >
      <svg
        class="fill-current h-4 w-4"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
      >
        <path
          d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
        />
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      default: null
    }
  }
}
</script>

<style lang="postcss" scoped>
.form-input {
  @apply block appearance-none rounded-md py-2 px-4 w-full shadow-inner bg-gray-100;
  box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
}

.form-input:focus {
  @apply outline-none shadow-outline;
}
</style>
