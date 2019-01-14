<style lang="scss" scoped>
    .splash-wrapper {
        position: absolute;
        z-index: -10;
        top: 0;
        left: 50%;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        width: 1200px;
        height: 675px;

        .splash-background {
            background-position: center 0px;
            opacity: 1;
            // transition: opacity .75s cubic-bezier(.165,.84,.44,1);
            transition: opacity .75s ease-out;
            -moz-transition: opacity .75s ease-out;
            -webkit-transition: opacity .75s ease-out;
            position: absolute;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            // background-size: 100% 100%;
            background-size: cover;
        }
    }

    .splash-spacer {
        padding-top: 400px;
        position: relative;
    } 
</style>

<template>
    <div>
        <div class="splash-wrapper">
            <div class="splash-background" :style="{ backgroundImage: 'url('+ path + ')' }">
            </div>
            
        </div>
        <div class="splash-spacer"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },
    props: ['path', 'mobile']
}
</script>
