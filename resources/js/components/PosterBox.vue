<style lang="scss" scoped>
.poster {

    img {
        
        // box-shadow: 5px 5px 5px;
        border-radius: 4px;
        width: 100%;
        height: auto;
        

    }
}
</style>
<template>
    <div class="poster">
        <img :src="path">
    </div>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },
    props: ['path'],
}
</script>
