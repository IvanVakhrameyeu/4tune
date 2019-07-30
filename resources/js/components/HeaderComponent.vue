<template>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <router-link to="/" class="navbar-brand logo"></router-link>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                        data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item mx-4 active">
                            <a class="nav-link" href="/games">Играть</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="#">Контакты</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="#"><i class="fa fa-comment"></i></a>
                        </li>
                        <li class="nav-item profile">
                            <ul class="navbar-nav ml-auto">

                                <a v-if="this.localStorage.user" class="nav-link" href="/profile">
                                    <li class="nav-item ml-4 profile">
                                        <a class="nav-link" href="#">
                                            <img :src="this.localStorage.user.avatar">
                                        </a>
                                    </li>
                                    <li class="nav-item profile">
                                        <b>{{this.localStorage.user.name}}</b>
                                        <span class="caret">100</span>
                                    </li>
                                </a>
                            </ul>
                        </li>

                        <li v-if="this.localStorage.user" class="nav-item ml-3">
                            <a class="nav-link" href="#">
                                <a class="dropdown-item" href="/logout">Выход
                                </a>
                            </a>
                        </li>

                        <li v-else class="nav-item mx-4">
                            <a class="nav-link" v-on:click="logout">Вход</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

</template>

<script>
    export default {
        name: "HeaderComponent",

        data: function () {
            return {
                user: null
            }
        },

        methods: {
            logout() {
                let that = this;
                axios.get('/logout')
                    .then(function (resp) {
                        that.localStorage.user = {};
                    })
            }
        }
    }
</script>

<style scoped>

</style>