import ReviewAPI from '../api/review.js'

export default {
    state: {
        reviews: [],
        reviewsLoadStatus: 0,
        review: {},
        reviewLoadStatus: 0,
        reviewPendingSubmission: {}
    },

    actions: {
        loadReviews({commit}) {
            commit('setReviewsLoadStatus', 1);

            ReviewAPI.getReviews()
                .then( function(response) {
                    console.log(response);
                    commit('setReviews', response.data);
                    commit('setReviewsLoadStatus', 2);
                })
                .catch( function(response) {
                    console.log(response);
                    commit('setReviews', []);
                    commit('setReviewsLoadStatus', 3);
                });
        },
        loadReview({commit}, data) {
            commit('setReviewLoadStatus', 1);

            ReviewAPI.getReview(data)
                .then( function(response) {
                    console.log(response);
                    commit('setReview', response.data);
                    commit('setReviewLoadStatus', 2);
                })
                .catch( function(response) {
                    console.log(response);
                    commit('setReview', {});
                    commit('setReviewLoadStatus', 3);
                });
        },
    },

    mutations: {
        setReviews(state, reviews) {
            state.reviews = reviews;
        },

        setReviewsLoadStatus(state, status) {
            state.reviewsLoadStatus = status;
        },

        setReview(state, review) {
            state.review = review;
        },

        setReviewLoadStatus(state, status) {
            state.reviewLoadStatus = status;
        },

        setReviewPendingSubmission(state, submission) {
            state.reviewPendingSubmission = submission;
        }
    },

    getters: {
        getReviews(state) {
            return state.reviews;
        },

        getReviewsLoadStatus(state) {
            return state.reviewsLoadStatus;
        },

        getReview(state) {
            return state.review;
        },

        getReviewLoadStatus(state) {
            return state.reviewLoadStatus;
        },

        getReviewPendingSubmission(state) {
            return state.reviewPendingSubmission;
        }
    }
}