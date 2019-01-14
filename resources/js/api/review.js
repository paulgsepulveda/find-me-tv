import { APP_CONFIG } from '../config.js'

export default {
    
    getReviews: function() {
        return axios.get(APP_CONFIG.API_URL + '/reviews');
    },

    getReview: function(review) {
        return axios.post(APP_CONFIG.API_URL + '/review', review);
    },

    createReview: function(review) {
        return axios.post(APP_CONFIG.API_URL+ '/create', review);
    },

    updateReview: function(review) {
        return axios.post(APP_CONFIG.API_URL+ '/update', review);
    }
}