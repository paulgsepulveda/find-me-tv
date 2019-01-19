import { APP_CONFIG } from '../config.js'

export default {

    login: function(params) {
        return axios.post(APP_CONFIG.API_URL + '/login')
    }
}