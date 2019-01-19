<style lang="scss" scoped>

</style>
<template>

    <div>
        <h2 class="section-heading">Similar Shows</h2>

        <!-- removed :stagePadding="16" due to awkard left gap -->
        <carousel :items="6" :loop="true" :margin="16">

            <router-link v-for="(similar, index) in similars" :key="index" :to="'/show/' + similar.id"><img :src="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[6] + similar.poster_path"></router-link>

        </carousel>
    </div>

</template>
<script>
import carousel from 'vue-owl-carousel'
import { APP_CONFIG }   from '../config.js'

export default {
    components: { carousel },
    data() {
        return {
            app_config: APP_CONFIG,
        }
    },
    props: ['similars'],
}
</script>
