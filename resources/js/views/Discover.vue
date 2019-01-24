<style>

</style>
<template>
    <div>
        <div class="loadingOverlay" v-if="discoverLoadStatus == 1 || discoverLoadStatus == 3"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-body bg-secondary mt-2">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Search</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" v-if="searchLoadStatus < 2">
                <div class="col">

                    <display-card v-for="(show, index) in discoverShows" :key="index"
                        :poster="show.poster_path"
                        :name="show.name"
                        :airdate="show.first_air_date"
                        :id="show.id"
                        :overview="show.overview"
                    ></display-card>

                </div>
            </div>

            <div class="row" v-if="searchLoadStatus == 2">
                <div class="col">

                    <display-card v-for="(show, index) in searchResults" :key="index"
                        :poster="show.poster_path"
                        :name="show.name"
                        :airdate="show.first_air_date"
                        :id="show.id"
                        :overview="show.overview"
                    ></display-card>

                </div>
            </div>

            <div class="row" v-if="searchLoadStatus == 3">
                <div class="col">
                    <!-- insert error message -->
                    <div class="card card-body bg-secondary mt-4">
                        <h2>An Error Has Occurred</h2>
                        <p>Your search failed to load. There may be a problem with the server at this time. Please try again.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { APP_CONFIG } from '../config.js'
import DisplayCard from '../components/DisplayCard.vue'

export default {
    created(){
        this.$store.dispatch('loadDiscovery');
    },

    data() {
        return {
            app_config: APP_CONFIG,
            searchResults: {},
            search: '',
            page: '',
            filters: {}
        }
    },

    methods: {

        /**
         * Used without setting a page value, the search returns the initial first page of the search for display.
         * 
         * Used as part of the pagination, it updates the query with the appropriate non-default page number.
         */
        search(page = 1) {
            this.$store.dispatch('loadSearchResults', this.search, page)
        }
    },

    computed: {
        discoverShows() {
            return this.$store.getters.getDiscovery;
        },

        discoverLoadStatus() {
            return this.$store.getters.getDiscoveryLoadStatus;
        },

        searchResults() {
            return this.$store.getters.getSearchResults;
        },

        searchLoadStatus() {
            return this.$store.getters.getSearchLoadStatus;
        }
    },

    components: {
        'display-card': DisplayCard
    }
}
</script>
