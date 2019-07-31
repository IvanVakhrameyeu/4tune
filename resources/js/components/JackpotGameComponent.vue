<template>
    <div class="jackpot">
        <div class="game-stats">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-block mx-auto text-center">
                        <b>63613</b>
                        <span>Максимальный джекпот сегодня</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-block mx-auto text-center">
                        <b>3576</b>
                        <span>Количество игр сегодня</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-block mx-auto text-center">
                        <b>149444</b>
                        <span>Максимальный джекпот</span>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center">Выбор комнаты</h3>
        <div class="select-rooms">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="select-room-block mx-auto text-center">
                        <p>Название</p>
                        <b>от 100 <i class="fa fa-rub"></i></b>
                        <span>Банк: <b>2484</b> <i class="fa fa-rub"></i></span>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="select-room-block mx-auto text-center">
                        <p>Название</p>
                        <b>от 100 <i class="fa fa-rub"></i></b>
                        <span>Банк: <b>2484</b> <i class="fa fa-rub"></i></span>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="select-room-block mx-auto text-center">
                        <p>Название</p>
                        <b>от 100 <i class="fa fa-rub"></i></b>
                        <span>Банк: <b>2484</b> <i class="fa fa-rub"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <p class="msg">
            Сделай ставку и получи возможность выиграть Джекпот
        </p>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "JackpotComponent"
    }
</script>

<style scoped>

</style>