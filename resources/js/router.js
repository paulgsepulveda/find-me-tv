import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Discover from './views/Discover.vue'
import Show from './views/Show.vue'
import Season from './views/Season.vue'
import Episode from './views/Episode.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/discover',
      name: 'discover',
      component: Discover
    },
    {
      path: '/show/:show',
      name: 'show',
      component: Show,
      props: true
    },
    {
      path: '/show/:show/season/:season',
      name: 'season',
      component: Season,
      props: true
    },
    {
      path: '/show/:show/season/:season/episode/:episode',
      name: 'episode',
      component: Episode,
      props: true
    }
  ]
})
