<style lang="scss" scoped>
.poster {

    border: 0rem;

    img {

        width: 100%;
        height: auto;
        border-radius: 4px;

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
