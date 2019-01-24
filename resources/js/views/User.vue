<style>

</style>
<template>

<div>
    <splash-header></splash-header>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>

</div>
    
</template>
<script>
import { APP_CONFIG } from '../config.js'
import SplashHeader from '../components/SplashHeader.vue'

export default {
    data() {
        return {
            app_config: APP_CONFIG,
            headerPath: ''
        }
    },

    components: {
        'splash-header': SplashHeader
    }
}
</script>
