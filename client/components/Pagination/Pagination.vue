<template>
  <div v-if="pagination" class="flex items-baseline">
    <button-el
      class="ml-auto mr-4"
      :disabled="pagination.current_page === 1"
      @click="$emit('prev')"
    >
      Prev
    </button-el>
    Page {{ pagination.current_page }} of {{ pagination.last_page }}
    <button-el
      class="ml-4"
      :disabled="pagination.current_page === pagination.last_page"
      @click="$emit('next')"
    >
      Next
    </button-el>
  </div>
</template>

<script>
import ButtonEl from '@/components/Button'

export default {
  components: {
    ButtonEl
  },

  props: {
    pagination: {
      type: Object,
      default: null
    }
  }
}
</script>
