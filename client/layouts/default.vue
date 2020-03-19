<template>
  <div>
    <page-header />
    <nuxt />
  </div>
</template>

<script>
import PageHeader from '@/components/PageHeader'

export default {
  components: {
    PageHeader
  }
}
</script>

<style lang="postcss">
body {
  @apply bg-gray-100;
}
</style>
