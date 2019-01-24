<style>

</style>
<template>
<div>
    <splash-header
        :path="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[6] + headerPath"
        :mobile="mobile"
    ></splash-header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Find The Best Recommendations</h1>
                <p>In the dim, distant past of...10 years ago, there were no review aggregators. In some respects, they're extremely useful: if you need to get a quick opinion about whether a movie is gonna be worth your time and money, they get the job done.</p>
                <p>But at the end of the day, you're only getting in imprecise average</p>

                <h2>We Do It Better</h2>
                <p>But even better than that one critic you trust is a close <em>circle</em> (*nudge* you get it...) </p>

            </div>
        </div>
    </div>
    
</template>
<script>
import { APP_CONFIG } from '../config.js'
import SplashHeader from '../components/SplashHeader.vue'

export default {
    data() {
        return {
            app_config: APP_CONFIG,
            headerPath: ''
        }
    },

    components: {
        'splash-header': SplashHeader
    }
}
</script>
