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
            // transition: opacity .75s cubic-bezier(.165,.84,.44,1);
            -webkit-mask-image:-webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)));
            mask-image: linear-gradient(to bottom, rgba(0,0,0,1), 80%, rgba(0,0,0,0));
            box-shadow: 50px 50px 50px 0 rgb(20, 24, 28) inset, -50px -250px 50px 0 rgb(20, 24, 28) inset;
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
