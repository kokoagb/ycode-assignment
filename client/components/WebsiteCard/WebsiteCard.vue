<template>
  <card>
    <card-inner class="flex text-teal-500 font-bold">
      <globe-icon class="mr-auto" />
      WEBSITE
    </card-inner>
    <card-inner>
      <div class="font-bold mb-4">
        {{ website.name }}
      </div>
      <card-detail>
        <link-icon class="link-icon mr-2" />
        <a :href="href" target="_blank" class="no-underline hover:underline">
          {{ website.url }}
        </a>
      </card-detail>
      <card-detail>
        <calendar-icon class="link-icon mr-2" />
        {{ website.created_at | dateTime }}
      </card-detail>
    </card-inner>
  </card>
</template>

<script>
import { format } from 'date-fns'
import Card, { CardInner, CardDetail } from '@/components/Card'
import GlobeIcon from '@/components/Icons/GlobeIcon'
import LinkIcon from '@/components/Icons/LinkIcon'
import CalendarIcon from '@/components/Icons/CalendarIcon'

export default {
  components: {
    Card,
    CardInner,
    CardDetail,
    GlobeIcon,
    LinkIcon,
    CalendarIcon
  },

  filters: {
    dateTime(value) {
      return format(new Date(value), 'yyyy-MM-dd hh:mm:ss')
    }
  },

  props: {
    website: {
      type: Object,
      default: () => ({})
    }
  },

  computed: {
    href() {
      const url = this.website.url
      return url.match(/^https*:\/\//) ? url : `http://${url}`
    }
  }
}
</script>

<style scoped>
.link-icon {
  width: 1rem;
  height: 1rem;
}
</style>
