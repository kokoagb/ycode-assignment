<template>
  <form-select :value="value" @change="value => $emit('input', value)">
    <option value="name">Name</option>
    <option value="created_at">Date</option>
  </form-select>
</template>

<script>
import { FormSelect } from '@/components/Form'

export default {
  components: {
    FormSelect
  },
  props: {
    value: {
      type: String,
      default: null
    }
  },
  methods: {
    handleChange() {
      this.$emit('change', this.sortBy)
    }
  }
}
</script>
