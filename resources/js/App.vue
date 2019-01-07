<template>
  <div>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <router-link class="navbar-brand" to="/">Find Me TV</router-link>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li>
            <router-link class="nav-link" to="/discover">Discover</router-link>
          </li>
        </ul>
      </div>
    </nav>

    <router-view/>

  </div>
</template>
<script>
  export default {

  }
</script>


<style lang="scss">

</style>
