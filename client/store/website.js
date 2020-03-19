export const state = () => ({
  inProgress: false,
  error: false
})

export const mutations = {
  reset(state) {
    state.inProgress = false
    state.error = false
  },

  saveWebsiteStart(state) {
    state.inProgress = true
    state.error = false
  },

  saveWebsiteSuccess(state) {
    state.inProgress = false
    state.error = false
  },

  saveWebsiteFailure(state, error) {
    state.loading = false
    state.error = error
  }
}

export const actions = {
  async saveWebsite({ commit }, website) {
    try {
      commit('saveWebsiteStart')
      await this.$axios.$post('/api/websites', website)
      commit('saveWebsiteSuccess')
    } catch (error) {
      if (error.response && error.response.data.errors) {
        commit('saveWebsiteFailure', {
          validationErrors: error.response.data.errors
        })
      } else {
        commit('saveWebsiteFailure', error)
      }
    }
  }
}
