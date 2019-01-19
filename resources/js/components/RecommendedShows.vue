<style>

</style>
<template>
    
</template>
<script>
import carousel from 'vue-owl-carousel'

export default {
    components: { carousel },
    data() {
        return {
            
        }
    },
    computed: {
        user() {
            return this.$store.getters.currentUser;
        }
    },
    props: ['recommendations'],
}
</script>
