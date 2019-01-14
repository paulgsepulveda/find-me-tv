<style>

</style>
<template>
    <div>
        <div class="loadingOverlay" v-if="discoverLoadStatus == 1 || discoverLoadStatus == 3"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    Filters go here!
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card" v-for="(show, index) in discoverShows" :key="index">
                        <img :src="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[4] + show.poster_path">
                        <h1>{{show.name}}</h1>
                        <h4>{{show.first_air_date}}</h4>
                        <p>{{show.overview}}</p>
                        <router-link class="btn btn-primary" :to="'/show/' + show.id">{{show.name}} Page</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { APP_CONFIG } from '../config.js'

export default {
    created(){
        this.$store.dispatch('loadDiscovery');
    },

    data() {
        return {
            app_config: APP_CONFIG,
            filters: {}
        }
    },
    computed: {
        discoverShows() {
            return this.$store.getters.getDiscovery;
        },

        discoverLoadStatus() {
            return this.$store.getters.getDiscoveryLoadStatus;
        }
    }
}
</script>
