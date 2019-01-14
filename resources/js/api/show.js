import { APP_CONFIG } from '../config.js'

export default {
    
    getShow: function(show) {
        return axios.get(APP_CONFIG.API_URL + '/show/' + show);
    },

    getSeason: function (show, season) {
        return axios.get(APP_CONFIG.API_URL + '/show/' + show + '/season/' + season);
    },

    getEpisode: function (show, season, episode) {
        return axios.get(APP_CONFIG.API_URL + '/show' + show + '/season/' + season + '/episode/' + episode);
    }
}