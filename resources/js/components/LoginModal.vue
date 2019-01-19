<style lang="scss" scoped>

</style>

<template>

    <div>
        <b-btn variant="success" v-b-modal.loginModal>Log In</b-btn>

        <b-modal id="loginModal" title="Sign In" :hide-footer="true">
            <a href="/login/google" v-on:click.stop="">Google
            </a>

            <a href="/login/facebook" v-on:click.stop="">Facebook
            </a>
        </b-modal>

    </div>
    
</template>

<script>
export default {
    
}
</script>
