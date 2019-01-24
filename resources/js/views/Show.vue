<style>
h1 {
    display: inline;
}

</style>
<template>
    <div>
        <div class="loadingOverlay d-flex align-items-center flex-column justify-content-center h-100 " v-if="showLoadStatus == 1 || showLoadStatus == 3" >
            <h1>Loading</h1>
            <br>
            <i class="fas fa-3x fa-spinner"></i>
        </div>

        <div v-if="showLoadStatus == 2">
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
                        <!-- <h1>{{showData.name}}</h1> <span>{{showData.first_air_date.substring(0,4)}} {{creator}}</span> -->
                        <overview
                            :name="showData.name"
                            :firstAir="showData.first_air_date"
                            :creatorArray="showData.created_by"
                        >
                        </overview>

                        <div class="row">
                            <div class="col-9">
                                <!-- <p>{{showData.overview}}</p> -->

                                <info-tabs
                                    :overview="showData.overview"
                                    :cast="showData.credits.cast"
                                    type="season"
                                    :typeData="showData.seasons"
                                    :show="show"
                                >
                                </info-tabs>
                            </div>
                            <div class="col-3">
                                <score-box :data="reviewData"></score-box>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row pt-5 pb-5">
                    <div class="col">
                        <similar-shows :similars="showData.similar.results"></similar-shows>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
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
import Overview         from '../components/Overview.vue'
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
        reviewData() {
            var review = this.findReview(this.$store.getters.getReviews, this.showData.id);

            if (typeof review == 'undefined' || review == false) {
                review = {
                    show: this.showData.id,
                    season: null,
                    episode: null,
                    id: null
                };
            }
            console.log(review);
            return review;
        }
    },
    
    components: {
        'score-box': ScoreBox,
        'poster-box': PosterBox,
        'info-tabs': InfoTabs,
        'splash-header': SplashHeader,
        'similar-shows': SimilarShows,
        'recommended-shows': RecommendedShows,
        'overview': Overview
    },

    mixins: [ReviewCheck],

    watch: {
    '$route' (to, from) {
        this.$store.dispatch('loadShow', to.params.show);
    }
  }
}
</script>
