<template>
  <div id="app">
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <router-link class="navbar-item" to="/">
          <a class="navbar-item is-size-4">Find Me TV</a> 
        </router-link>

        <a role="button" v-on:click="clickBurger" v-bind:class="{'is-active': menuActive}" class="navbar-burger" aria-label="menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div class="navbar-menu" id="navMenu" v-bind:class="{'is-active': menuActive}">
        <div class="navbar-end">
          <router-link class="navbar-item is-size-5" to="/">Home</router-link>
          <a class="navbar-item is-size-5" href="/#unbreakable">Unbreakable</a>
          <a class="navbar-item is-size-5" href="/#products">Products</a>
          <router-link class="navbar-item is-size-5" to="/ideas">Ideas</router-link>
          <a class="navbar-item is-size-5" href="/#about">About</a>
        </div>
      </div>
    </nav>

    <router-view/>

  </div>
</template>
<script>
  export default {
    data() {
      return {
        menuActive: false
      }
    },
    methods: {
      clickBurger() {
        if(this.menuActive == false) {
          this.menuActive = true;
        } else {
          this.menuActive = false;
        }
      }
    }
  }
</script>


<style lang="scss">

</style>
