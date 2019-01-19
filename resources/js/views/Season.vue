<style lang="scss" scoped>

</style>
<template>
    <div>
        <div class="loadingOverlay d-flex align-items-center flex-column justify-content-center h-100 " v-if="seasonLoadStatus == 1 || seasonLoadStatus == 3" >
            <h1>Loading</h1>
            <br>
            <i class="fas fa-3x fa-spinner"></i>
        </div>

        <div v-if="seasonLoadStatus == 2">
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
                        
                        <overview
                            :name="showData.name"
                            :firstAir="showData.first_air_date"
                            :creatorArray="showData.created_by"
                        >
                        </overview>

                        <div class="row">
                            <div class="col-9">
                                <p>{{showData.overview}}</p>

                                <info-tabs
                                    :overview="showData.overview"
                                    :cast="showData.credits.cast"
                                    type="episode"
                                    :typeData="seasonData.episodes"
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
    props: ['show', 'season', 'mobile'],

    data() {
        return {
            app_config: APP_CONFIG,
        }
    },

    created() {
        if (this.$store.getters.getShowLoadStatus == 0) {
            this.$store.dispatch('loadShow', this.show);
        }

        this.$store.dispatch('loadSeason', {
            show: this.show,
            season: this.season
        });
        
        if(!this.$store.getters.getReviews) {
            this.$store.dispatch('loadReviews')
        }

    },

    computed: {
        showData() {
            return this.$store.getters.getShow;
        },

        seasonData() {
            return this.$store.getters.getSeason;
        },

        creator() {
            if (this.showData.created_by.length > 1 ) {

                var creators = 'Created by ';
                this.showData.created_by.forEach(function(creator) {
                    creators = creators + creator.name + ' ';
                });
                return creators;

            } else if (this.showData.created_by.length > 0 ) {

                var creators = 'Created by ' + this.showData.created_by[0].name;
                return creators;

            } else {
                return '';
            }
        },

        seasonLoadStatus() {
            return this.$store.getters.getSeasonLoadStatus;
        },

        reviewData() {
            var review = this.findReview(this.$store.getters.getReviews, this.showData.id, this.seasonData.season_number);

            if (typeof review == 'undefined' || review == false) {
                review = {
                    show: this.showData.id,
                    season: this.seasonData.season_number,
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
            this.$store.dispatch('loadSeason', {show: to.params.show, season: to.params.season});
        }
    }
}
</script>
