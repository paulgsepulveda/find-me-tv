import Vue from 'vue'
import Vuex from 'vuex'
import shows from './modules/shows.js'
import reviews from './modules/reviews.js'
import user from './modules/user.js'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    shows,
    reviews,
    user
  }
})
