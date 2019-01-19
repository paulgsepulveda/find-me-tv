<style lang="scss" scoped>
h1 {
    display: inline;
}
</style>

<template>

    <div class="pb-2">
        <h1>{{name}}</h1> <span>{{airDate}} {{creator}}</span>
    </div>

</template>

<script>

export default {

    data() {
        return {

        }
    },

    props: ['name', 'firstAir', 'creatorArray'],

    computed: {

        airDate() {
            return this.firstAir.substring(0,4);
        },

        creator() {
            if (this.creatorArray.length > 1 ) {

                var creators = 'Created by ';
                this.creatorArray.forEach(function(creator) {
                    creators = creators + creator.name + ' ';
                });
                return creators;

            } else if (this.creatorArray.length == 1 ) {

                var creators = 'Created by ' + this.creatorArray[0].name;
                return creators;

            } else {
                return '';
            }
        },
    }

}
</script>