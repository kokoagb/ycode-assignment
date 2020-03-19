export const state = () => ({
  loading: false,
  error: false,
  list: [],
  pagination: null
})

export const mutations = {
  loadWebsitesStart(state) {
    state.loading = true
    state.error = false
    state.list = []
    state.pagination = null
  },

  loadWebsitesSuccess(state, { data, meta }) {
    state.loading = false
    state.error = false
    state.list = data
    state.pagination = meta
  },

  loadWebsitesFailure(state, error) {
    state.loading = false
    state.error = error
    state.list = []
    state.pagination = null
  }
}

export const actions = {
  async loadWebsites({ commit }, { page, filter, orderBy } = {}) {
    try {
      commit('loadWebsitesStart')
      const params = { page, filter, orderBy }
      const response = await this.$axios.$get('/api/websites', { params })
      commit('loadWebsitesSuccess', response)
    } catch (error) {
      commit('loadWebsitesFailure', error)
    }
  }
}
