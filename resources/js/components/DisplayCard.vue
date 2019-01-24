<style lang="scss" scoped>

.display-card {

    padding-top: 1rem;
    padding-bottom: 1rem;
}
</style>

<template>

    <div class="media display-card">
        <img class="mr-3" :src="imgPath" alt="Display Item Poster">
        <div class="media-body">
            <div class="pt-1 pb-2">
                <h4 class="d-inline">{{ name }}</h4>
                <span class="float-right d-inline"><strong>{{ aired }}</strong></span>
            </div>
            <div>
                <p>{{ overview }}</p>
                <router-link class="btn btn-success mt-auto" :to="'/show/' + id">{{name}} Page</router-link>
            </div>
        </div>
    </div>

</template>

<script>
import { APP_CONFIG } from '../config.js'

export default {
    props: ['poster', 'name', 'id', 'airdate', 'overview'],
    
    data() {
        return {
            app_config: APP_CONFIG
        }
    },

    computed: {
        imgPath() {
            var path = this.app_config.IMAGE_BASE + '/' + this.app_config.IMAGE_SIZES.poster_sizes[2] + this.poster;
            return path;
        },

        aired() {
            return this.airdate.substring(0,4);
        }
    }

}

</script>