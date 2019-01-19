<style lang="scss" scoped>

.wrapper {
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: center;

    height: 12rem;
}

.score-container {

    height: 5rem;
    width: 7rem;
    text-align: center;
    margin: auto;
    border-radius: 5px;
    // margin-top: 1rem;
    // margin-bottom: 1rem;
    // padding-top: 0.5rem;
    // padding-bottom: 0.5rem;
    

}

.tier-0 {
    background-color: #00BF41;
}

.tier-1 {
    background-color: #E5002E;
}

.tier-2 {
    background-color: #CB1530;
}

.tier-3 {
    background-color: #B22A32;
}

.tier-4 {
    background-color: #983F34;
}

.tier-5 {
    background-color: #7F5436;
}

.tier-6 {
    background-color: #656A38;
}

.tier-7 {
    background-color: #4C7F3A;
}

.tier-8 {
    background-color: #32943C;
}

.tier-9 {
    background-color: #19A93E;
}

.tier-10 {
    background-color: #00BF41;
}

.score {
    color: white;
    font-size: 3rem;
    font-family: Merriweather;
    text-align: center;

    .tier {
        text-transform: uppercase;
        font-size: 1.5rem;
        display: inline;
    }
}

.review-box {

    border: 1px, white;
}

</style>
<template>
    <div class="wrapper">
        <!-- Primary Display -->
        <div :class="'score-container tier-' + tier">
            <div class="score">
                {{score}}
                <div v-if="tier">
                    Tier{{tier}}
                </div>
            </div>
        </div>
        <button class="btn btn-success text-center" v-click="">Add Review</button>

        <!-- Add / Update review -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            newRating: '',
            newReview: '',
            updatingReview: '',
        }
    },
    props: {
        score: String,
        tier: Number,
        review: String,
        auth: Boolean,
        reviewItem: Object
    },
    computed: {

    },
    methods: {

    }
}
</script>
