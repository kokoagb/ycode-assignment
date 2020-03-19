<template>
  <container>
    <heading-1>Add new website</heading-1>
    <card>
      <card-inner>
        <form-container @submit="handleSubmit">
          <form-label :errors="validationErrors.name">
            Name
          </form-label>
          <form-input v-model="name" placeholder="e.g. My website" />
          <form-label :errors="validationErrors.url">
            URL
          </form-label>
          <form-input v-model="url" placeholder="e.g. www.mywebsite.com" />
          <div class="flex justify-end">
            <button-el variant="cta">Submit</button-el>
          </div>
        </form-container>
      </card-inner>
    </card>
    <div v-if="error" class="mt-4 text-red-700">There has been an error</div>
  </container>
</template>

<script>
import { mapState } from 'vuex'
import { Heading1 } from '@/components/Headings'
import Container from '@/components/Container'
import Card, { CardInner } from '@/components/Card'
import FormContainer, { FormInput, FormLabel } from '@/components/Form'
import ButtonEl from '@/components/Button'

export default {
  components: {
    Heading1,
    Container,
    Card,
    CardInner,
    FormContainer,
    FormInput,
    FormLabel,
    ButtonEl
  },

  data: () => ({
    name: null,
    url: null,
    validationErrors: {}
  }),

  computed: {
    ...mapState('website', ['inProgress', 'error'])
  },

  watch: {
    error(error) {
      if (error.validationErrors) {
        this.validationErrors = error.validationErrors
      }
    }
  },

  mounted() {
    this.$store.commit('website/reset')
  },

  methods: {
    async handleSubmit() {
      try {
        this.validate()
      } catch (error) {
        return
      }

      await this.$store.dispatch('website/saveWebsite', {
        name: this.name,
        url: this.url
      })

      if (this.error) return

      this.$router.push({
        path: '/websites'
      })
    },

    validate() {
      this.validationErrors = {}

      if (!this.name) {
        this.validationErrors = {
          ...this.validationErrors,
          name: ['This field cannot be empty']
        }
      }

      if (!this.url) {
        this.validationErrors = {
          ...this.validationErrors,
          url: ['This field cannot be empty']
        }
      }

      if (Object.keys(this.validationErrors).length > 0) {
        throw this.validationErrors
      }
    }
  },

  head() {
    return {
      title: 'Ycode assignment - Add new'
    }
  }
}
</script>
