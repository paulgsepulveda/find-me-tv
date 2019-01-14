import { APP_CONFIG } from '../config.js'

export default {
    
    getDiscover: function(params = null) {
        return axios.post(APP_CONFIG.API_URL + '/discover', params);
    },

    getParameters: function (params) {
        var queryString = [];
        for (var param in params)
          if (params.hasOwnProperty(param)) {
            queryString.push(encodeURIComponent(param) + "=" + encodeURIComponent(params[param]));
          }
        return queryString.join("&");
      }
}