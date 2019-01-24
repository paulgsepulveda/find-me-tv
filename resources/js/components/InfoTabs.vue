<style lang="scss" scoped>

</style>
<template>
    <div>
        <b-tabs>
            <b-tab title="Overview" active>
                <br>
                <h3 class="pb-1" v-if="name">{{name}}</h3>
                <p>{{overview}}</p>
            </b-tab>
            <b-tab title="Cast">
                <br>
                <b-badge v-for="(member, index) in cast" variant="secondary" :key="index">{{member.name}}</b-badge>
            </b-tab>
            <b-tab :title="type + 's'" >
                <br>
                <b-badge v-for="(item, index) in typeData" :key="index" :to="path + item[type + '_number']" class="btn btn-secondary">{{item.name}}</b-badge>
            </b-tab>
            <!-- <b-tab title="Details">
                <br>
                <div class="row">
                    <div class="col">
                        <strong>Status</strong>
                        <br>
                    </div>
                    <div class="col">
                        <strong>
                    </div>
                </div>
            </b-tab> -->
        </b-tabs>
    </div>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },

    props: ['name', 'overview', 'cast','type', 'typeData', 'show', 'season'],

    computed: {
        path() {
            if (this.type == 'season') {
                var path = '/show/' + this.show + '/season/';
                return path;
            } else {
                var path = '/show/' + this.show + '/season/' + this.season + '/episode/';
                return path;
            }
        }
    }
}
</script>
