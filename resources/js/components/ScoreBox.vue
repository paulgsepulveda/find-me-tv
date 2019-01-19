<style lang="scss" scoped>

</style>
<template>
    <div class="card border-none bg-secondary d-flex align-items-center flex-column justify-content-center">

        <div v-if="auth">
            <div v-if="data.tier != 0" class="">
                <score-container
                    :score="data.score"
                    :tier="data.tier"
                    :auth="auth"
                    :review="data.review"
                    :reviewItem="reviewItem"
                >
                </score-container>
            </div>
            <div v-else class="">
                <score-container
                    :score="N/A"
                    :tier="0"
                    :auth="auth"
                    :review="'No Review'"
                    :reviewItem="data"
                >
                </score-container>
            </div>
        </div>
        <div v-else>
           <score-container
                score="N/A"
                :tier="0"
                :auth="auth"
                :review="'Sign In To Review'"
                :reviewItem="data"
            >
            </score-container>
        </div>
    </div>
</template>
<script>
import ReviewCheck      from '../mixins/ReviewCheck.vue'
import ScoreContainer   from './ScoreContainer.vue'

export default {
    data() {
        return {
        }
    },
    computed: {
        auth() {
            var user = this.$store.getters.currentUser;

            if(user == true) {
                return true;
            } else {
                return false;
            }
        },
        reviewItem() {
            item = {
                show: this.data.show_id,
                season: this.data.season_id,
                episode: this.data.episode_id
            }

            return item;
        }
    },
    methods: {

    },
    components: {
        'score-container': ScoreContainer
    },
    props: ['data'],
    mixins: [ReviewCheck]
}
</script>
