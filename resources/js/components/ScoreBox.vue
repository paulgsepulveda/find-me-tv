<style>

</style>
<template>
    <div class="card">
        <div class="card-body">
            <p>{{review.tier}}</p>
            <p>{{review.score}}</p>
            <button class="btn btn-primary">Update</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },
    props: ['review'],
}
</script>
