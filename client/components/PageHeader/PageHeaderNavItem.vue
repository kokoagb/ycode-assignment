<template>
  <li class="page-header-nav-item">
    <nuxt-link :to="menuItem.link">{{ menuItem.label }}</nuxt-link>
  </li>
</template>

<script>
export default {
  props: {
    menuItem: {
      type: Object,
      default: () => ({})
    }
  }
}
</script>

<style lang="postcss" scoped>
.page-header-nav-item a {
  @apply block p-4 text-teal-900;
}

.page-header-nav-item a.nuxt-link-exact-active {
  @apply bg-teal-900 text-teal-100;
}
</style>
