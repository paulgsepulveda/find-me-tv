<style lang="scss" scoped>

</style>
<template>
    <div>
        <b-tabs>
            <b-tab title="Cast" active>
                <br>
                <b-badge v-for="(member, index) in cast" variant="light" :key="index">{{member.name}}</b-badge>
            </b-tab>
            <b-tab :title="type" >
                <br>
                <router-link v-for="(item, index) in typeData" :key="index" :to="'/show/' + show + '/' + item.id" class="btn btn-secondary">{{item.name}}</router-link>
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
    props: ['name', 'overview', 'cast','type', 'typeData', 'show']
}
</script>
