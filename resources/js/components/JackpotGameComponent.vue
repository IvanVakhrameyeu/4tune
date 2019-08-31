<template>
    <div class="jackpot">
        <div class="game-stats">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-block mx-auto text-center">
                        <b>{{maxJackpotToday}}</b>
                        <span>Максимальный джекпот сегодня</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-block mx-auto text-center">
                        <b>{{countGamesToday}}</b>
                        <span>Количество игр сегодня</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-block mx-auto text-center">
                        <b>{{maxJackpot}}</b>
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
                        <b>от 10 <i class="fa fa-rub"></i></b>
                        <span>Банк: <b>{{FirstBank-(FirstBank*10/100)}}</b> <i class="fa fa-rub"></i></span>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="select-room-block mx-auto text-center">
                        <p>Название</p>
                        <b>от 100 <i class="fa fa-rub"></i></b>
                        <span>Банк: <b>{{SecondBank-(SecondBank*10/100)}}</b> <i class="fa fa-rub"></i></span>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" class="select-room-block mx-auto text-center">
                        <p>Название</p>
                        <b>от 1000 <i class="fa fa-rub"></i></b>
                        <span>Банк: <b>{{ThirdBank-(ThirdBank*10/100)}}</b> <i class="fa fa-rub"></i></span>
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
        name: "JackpotComponent",

        data: function () {
            return {
                maxJackpotToday: 0,
                countGamesToday: 0,
                maxJackpot: 0,

                FirstBank: 0,
                SecondBank: 0,
                ThirdBank: 0,
            }
        },
        mounted() {
            this.getData();

            this.connectChannel();

            this.getBanks();
        },
        beforeDestroy() {

        },
        methods: {
            connectChannel: function () {
                window.Echo.channel('JackpotBankChannel')
                    .listen('JackpotBankEvent', (e) => {
                        console.log(e.bankChangeMessage);
                        switch (e.bankChangeMessage.roomNumber) {
                            case '1':
                                if (Number(e.bankChangeMessage.amount) !== 0) {
                                    this.FirstBank += Number(e.bankChangeMessage.amount);
                                } else {
                                    this.FirstBank = 0;
                                }
                                break;
                            case '2':
                                if (Number(e.bankChangeMessage.amount) !== 0) {
                                    this.SecondBank += Number(e.bankChangeMessage.amount);
                                } else {
                                    this.SecondBank = 0;
                                }
                                break;
                            case '3':
                                if (Number(e.bankChangeMessage.amount) !== 0) {
                                    this.ThirdBank += Number(e.bankChangeMessage.amount);
                                } else {
                                    this.ThirdBank = 0;
                                }
                                break;
                        }
                    });
            },
            getBanks: function () {
                let app = this;
                axios.post('/getBankInfo', {})
                    .then(function (resp) {
                        app.FirstBank += Number(resp.data.playerBetFirst);
                        app.SecondBank += Number(resp.data.playerBetSecond);
                        app.ThirdBank += Number(resp.data.playerBetThird);
                    });
            },
            getData: function () {
                let app = this;
                axios.post('/getJackpotData', {})
                    .then(function (resp) {
                        if ((resp.data.maxJackpotToday) !== null) {
                            app.maxJackpotToday = resp.data.maxJackpotToday;
                        }
                        if ((resp.data.countGamesToday) !== null) {
                            app.countGamesToday = resp.data.countGamesToday;
                        }
                        app.maxJackpot = resp.data.maxJackpot;
                    });
            },
        }
    }
</script>

<style scoped>

</style>
