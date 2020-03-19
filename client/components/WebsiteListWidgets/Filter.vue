<template>
  <form-input
    :value="value"
    placeholder="Filter by name..."
    @input="value => $emit('input', value)"
  />
</template>

<script>
import { FormInput } from '@/components/Form'

export default {
  components: { FormInput },

  props: {
    value: {
      type: String,
      default: null
    }
  }
}
</script>
