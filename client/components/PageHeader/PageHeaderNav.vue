<template>
  <nav>
    <ul class="flex">
      <page-header-nav-item
        v-for="menuItem in menuItems"
        :key="menuItem.link"
        :menu-item="menuItem"
      />
    </ul>
  </nav>
</template>

<script>
import PageHeaderNavItem from './PageHeaderNavItem'

export default {
  components: {
    PageHeaderNavItem
  },

  props: {
    menuItems: {
      type: Array,
      default: () => []
    }
  }
}
</script>
