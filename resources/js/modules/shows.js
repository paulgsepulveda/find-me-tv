import ShowAPI from '../api/show.js'
import DiscoverAPI from '../api/discover.js'

export default {
    state: {
        show: {},
        showLoadStatus: 0,
        season: {},
        seasonLoadStatus: 0,
        episode: {},
        episodeLoadStatus: 0,
        discovery: {},
        discoveryLoadStatus: 0
    },

    actions: {
        loadShow({commit}, data) {
            commit('setShowLoadStatus', 1);

            ShowAPI.getShow(data)
                .then( function(response) {
                    console.log(response.data);
                    commit('setShow', response.data);
                    commit('setShowLoadStatus', 2);
                })
                .catch( function(response) {
                    console.log(response);
                    commit('setShow', {});
                    commit('setShowLoadStatus', 3);
                });
        },

        loadSeason({commit}, data) {
            commit('setSeasonLoadStatus', 1);

            ShowAPI.getSeason(data.show, data.season)
                .then( function(response) {
                    console.log(response.data);
                    commit('setSeason', response.data);
                    commit('setSeasonLoadStatus', 2);
                }) 
                .catch( function(response) {
                    console.log(response);
                    commit('setSeason', {});
                    commit('setSeasonLoadStatus', 3);
                });
        },

        loadEpisode({commit}, data) {
            commit('setEpisodeLoadStatus', 1);

            ShowAPI.getEpisode(data)
                .then( function(response) {
                    console.log(response);
                    commit('setEpisode', response.data);
                    commit('setEpisodeLoadStatus', 2)
                })
                .catch( function(response) {
                    console.log(response);
                    commit('setEpisode', {});
                    commit('setEpisodeLoadStatus', 3)
                });
        },

        loadDiscovery({commit}, data = null) {
            commit('setDiscoveryLoadStatus', 1);

            DiscoverAPI.getDiscover(data)
                .then( function(response) {
                    console.log(response.data.results);
                    commit('setDiscovery', response.data.results);
                    commit('setDiscoveryLoadStatus', 2);
                })
                .catch( function(response) {
                    console.log(response);
                    commit('setDiscovery', {});
                    commit('setDiscoveryLoadStatus', 3);
                });
        }
    },

    mutations: {
        setShow(state, show) {
            state.show = show;
        },

        setShowLoadStatus(state, status) {
            state.showLoadStatus = status;
        },

        setSeason(state, season) {
            state.season = season;
        },

        setSeasonLoadStatus(state, status) {
            state.seasonLoadStatus = status;
        },

        setEpisode(state, episode) {
            state.episode = episode;
        },

        setEpisodeLoadStatus(state, status) {
            state.episodeLoadStatus = status;
        },

        setDiscovery(state, discovery) {
            state.discovery = discovery;
        },

        setDiscoveryLoadStatus(state, status) {
            state.discoveryLoadStatus = status;
        }
    },

    getters: {
        getShow(state) {
            return state.show;
        },

        getShowLoadStatus(state) {
            return state.showLoadStatus;
        },

        getSeason(state) {
            return state.season;
        },

        getSeasonLoadStatus(state) {
            return state.seasonLoadStatus;
        },

        getEpisode(state) {
            return state.episodeLoadStatus;
        },

        getDiscovery(state) {
            return state.discovery;
        },

        getDiscoveryLoadStatus(state) {
            return state.discoveryLoadStatus;
        }
    }
}