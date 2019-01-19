<style lang="scss" scoped>

</style>
<template>
    <div>
        <b-tabs>
            <b-tab title="Cast" active>
                <br>
                <b-badge v-for="(member, index) in cast" variant="secondary" :key="index">{{member.name}}</b-badge>
            </b-tab>
            <b-tab :title="type + 's'" >
                <br>
                <b-badge v-for="(item, index) in typeData" :key="index" :to="'/show/' + show + '/' + type + '/' + item[type + '_number']" class="btn btn-secondary">{{item.name}}</b-badge>
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
    props: ['overview', 'cast','type', 'typeData', 'show']
}
</script>
