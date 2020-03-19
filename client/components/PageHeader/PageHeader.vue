<template>
  <div class="page-header">
    <container class="flex">
      <page-header-nav :menu-items="menuItems" />
    </container>
  </div>
</template>

<script>
import PageHeaderNav from './PageHeaderNav'
import Container from '@/components/Container'

export default {
  components: {
    Container,
    PageHeaderNav
  },

  data: () => ({
    menuItems: [
      {
        label: 'Websites',
        link: '/websites'
      },
      {
        label: 'Add new',
        link: '/websites/create'
      }
    ]
  })
}
</script>

<style scoped lang="postcss">
.page-header {
  @apply bg-teal-500 shadow-lg;
}
</style>
