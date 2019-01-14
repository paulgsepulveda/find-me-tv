<style>

</style>
<template>
    <div>
        <div class="loadingOverlay" v-if="showLoadStatus == 1 || showLoadStatus == 3"></div>
        <splash-header
            :path="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[6] + showData.backdrop_path"
            :mobile="mobile"
            ></splash-header>
        <div class="container" >
            
            <div class="row">
                <div class="col-3">
                    <poster-box 
                        :path="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[6] + showData.poster_path">
                    </poster-box>
                </div>
                <div class="col">
                    <h1>{{showData.name}}</h1> <span>{{showData.first_air_date.substring(0,4)}} Created By {{showData.created_by[0].name}}</span>

                    <div class="row">
                        <div class="col">
                            <info-tabs
                                :name="showData.name"
                                :overview="showData.overview"
                                :cast="showData.credits.cast"
                                type="Seasons"
                                :typeData="showData.seasons"
                            >
                            </info-tabs>
                        </div>
                        <div class="col">
                            <!-- score box -->
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { APP_CONFIG }   from '../config.js'
import ScoreBox         from '../components/ScoreBox.vue'
import PosterBox        from '../components/PosterBox.vue'
import InfoTabs         from '../components/InfoTabs.vue'
import SplashHeader     from '../components/SplashHeader.vue'
import SimilarShows     from '../components/SimilarShows.vue'
import RecommendedShows from '../components/RecommendedShows.vue'
import ReviewCheck      from '../mixins/ReviewCheck.vue'

export default {
    props: ['show', 'mobile'],
    data() {
        return {
            app_config: APP_CONFIG,
        }
    },

    created() {
        this.$store.dispatch('loadShow', this.show);
        
        if(!this.$store.getters.getReviews) {
            this.$store.dispatch('loadReviews')
        }

    },

    computed: {
        showData() {
            return this.$store.getters.getShow;
        },

        showLoadStatus() {
            return this.$store.getters.getShowLoadStatus;
        },
        review() {
            review = this.findReview(this.$store.getters.getReviews, this.showData.id);
            return review;
        }
    },
    
    components: {
        'score-box': ScoreBox,
        'poster-box': PosterBox,
        'info-tabs': InfoTabs,
        'splash-header': SplashHeader,
        'similar-shows': SimilarShows,
        'recommended-shows': RecommendedShows
    },

    mixins: [ReviewCheck]
}
</script>
