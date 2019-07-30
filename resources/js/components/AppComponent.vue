<template>
        <div class="container-fluid" v-bind:class="{'app': user, 'promo': !user}">
                <app-header></app-header>
                <games v-if="user"></games>
                <promo v-else></promo>
                <app-footer></app-footer>
        </div>
</template>

<script>
    export default {
        name: "AppComponent",
        mounted() {
                let app = this;
                console.log(this);
                axios.get('/getUser')
                  .then(function (resp) {
                     app.localStorage.user = resp.data;
                     app.user = resp.data;
                  })
        },

        data: function () {
            return {
               user: null
            }
        }
    }
</script>

<style scoped>

</style>