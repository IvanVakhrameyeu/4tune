<template>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <router-link :to="{name: 'games'}" class="navbar-brand logo">
                </router-link>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mobileMenuModal" aria-controls="mobileMenuModal"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="mobileMenuModal">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="#"><i class="fa fa-vk"></i></a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="#"><i class="fa fa-telegram"></i></a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="#"><i class="fa fa-comment"></i></a>
                        </li>

                        <li v-if="this.localStorage.user" class="nav-item ml-4 profile">
                            <a class="nav-link" href="#">
                                <img :src="this.localStorage.user.avatar"/>
                            </a>
                        </li>
                        <li v-if="this.localStorage.user" class="nav-item profile">
                            <router-link :to="{name: 'profile'}" class="nav-link">
                                <b>{{this.localStorage.user.name}}</b>
                                <span>100 р</span>
                            </router-link>
                        </li>
                        <li v-if="this.localStorage.user" class="nav-item ml-3">
                            <a class="nav-link" href="/logout">Выход</a>
                        </li>

                        <li v-else class="nav-item ml-3">
                            <a class="nav-link" href="/login/vkontakte">Вход</a>
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

        }
    }
</script>

<style scoped>

</style>