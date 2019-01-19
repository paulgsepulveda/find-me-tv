<style>

</style>
<template>
    <div>
        <div class="loadingOverlay d-flex align-items-center flex-column justify-content-center h-100 " v-if="seasonLoadStatus == 1 || seasonLoadStatus == 3" >
            <h1>Loading</h1>
            <br>
            <i class="fas fa-3x fa-spinner"></i>
        </div>

        <div v-if="seasonLoadStatus == 2">
            <splash-header
                :path="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[6] + showData.backdrop_path"
                :mobile="mobile"
            ></splash-header>
            <div class="container" >
                <div class="row">
                    <div class="col-3">
                        <poster-box 
                            :path="app_config.IMAGE_BASE + '/' + app_config.IMAGE_SIZES.poster_sizes[6] + showData.poster_path">
                        </poster-box>
                    </div>
                    <div class="col">
                        
                        <overview
                            :name="showData.name"
                            :firstAir="showData.first_air_date"
                            :creatorArray="showData.created_by"
                        >
                        </overview>

                        <div class="row">
                            <div class="col-9">
                                <p>{{showData.overview}}</p>

                                <info-tabs
                                    :overview="showData.overview"
                                    :cast="showData.credits.cast"
                                    type="episode"
                                    :typeData="seasonData.episodes"
                                    :show="show"
                                >
                                </info-tabs>
                            </div>
                            <div class="col-3">
                                <score-box :data="reviewData"></score-box>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row pt-5 pb-5">
                    <div class="col">
                        <similar-shows :similars="showData.similar.results"></similar-shows>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
