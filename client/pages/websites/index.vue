<template>
  <container>
    <heading-1>Websites</heading-1>
    <div class="md:flex md:flex-wrap md:items-baseline">
      <filter-el
        v-model="filter"
        class="flex-1 mr-4"
        @input="handleFilterChange"
      />
      <div class="flex items-baseline">
        Sort by:
        <order-by
          v-model="orderBy"
          class="ml-2 flex-1"
          @input="updateWebsites"
        />
      </div>
    </div>
    <div v-if="loading">
      Loading...
    </div>
    <div v-else-if="error">
      There has been an error
    </div>
    <grid v-else>
      <website-card
        v-for="website in websites"
        :key="website.id"
        :website="website"
      />
    </grid>
    <pagination
      class="mt-4"
      :pagination="pagination"
      @prev="handlePrevClick"
      @next="handleNextClick"
    />
  </container>
</template>

<script>
import { debounce } from 'lodash'
import { mapState } from 'vuex'
import { Heading1 } from '@/components/Headings'
import Container from '@/components/Container'
import Grid from '@/components/Grid'
import WebsiteCard from '@/components/WebsiteCard'
import { FilterEl, OrderBy } from '@/components/WebsiteListWidgets'
import Pagination from '@/components/Pagination'

export default {
  components: {
    Heading1,
    Container,
    Grid,
    WebsiteCard,
    FilterEl,
    OrderBy,
    Pagination
  },

  async middleware({ store }) {
    await store.dispatch('websites/loadWebsites')
  },

  data: () => ({
    filter: null,
    orderBy: 'name',
    currentPage: 1
  }),

  computed: {
    ...mapState('websites', {
      websites: 'list',
      pagination: 'pagination',
      loading: 'loading',
      error: 'error'
    })
  },

  watch: {
    pagination() {
      try {
        this.currentPage = this.pagination.current_page
      } catch (e) {
        this.currentPage = 1
      }
    }
  },

  methods: {
    updateWebsites() {
      this.$store.dispatch('websites/loadWebsites', {
        page: this.currentPage,
        filter: this.filter,
        orderBy: this.orderBy
      })
    },

    handleFilterChange: debounce(function() {
      this.updateWebsites()
    }, 500),

    handlePrevClick() {
      this.currentPage--
      this.updateWebsites()
    },

    handleNextClick() {
      this.currentPage++
      this.updateWebsites()
    }
  },

  head() {
    return {
      title: 'Ycode assignment - Websites'
    }
  }
}
</script>
