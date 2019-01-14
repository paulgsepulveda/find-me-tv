<script>
export default {
    data() {
        return {
            
        }
    },
    methods: {
        findReview(reviews, show, season = null, episode = null) {
            
            var review = false;

            if (episode) {
                review = reviews.filter(item => item.episode_id == episode && item.season_id == season && item.show_id == show);

            } else if (season) {
                review = reviews.filter(item => item.season_id == season && item.show_id == show);
            } else {
                review = reviews.filter(item => item.show_id == show);
            }

            if (review) {
                return review;
            } else {
                return false;
            }
        }
    },
}
</script>
