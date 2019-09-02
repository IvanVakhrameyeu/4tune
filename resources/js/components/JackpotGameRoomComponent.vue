<template>
    <div class="room">
        <div class="jackpot-info">
            <h4 class="text-center mx-auto">Джекпот сейчас: <b>{{currentJackpot - (currentJackpot *10/100)}} <i
                class="fa fa-rub"></i></b></h4>
            <div class="win-info">
                <div v-for="result in winResult">
                    <div class="winner">
                        <b>Победил:</b> {{result.winName}}
                    </div>
                    <div class="ticket">
                        <b>Билет:</b> #{{result.winTicket}}
                    </div>
                    <div class="win-sum">
                        Выигрыш: <b>{{result.winAmount}}<i class="fa fa-rub"></i></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="jackpot-process">
            <div class="jackpot-progress">
                <div class="bar">
                    <div class="progress" style="margin-left: 0%;
    transition: all 5s cubic-bezier(0.51, 0.18, 0.22, 1) 0s;">
                        <div class="overdiv"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 0%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 34%" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 64%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 100%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 134%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 164%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 200%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 234%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 264%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 300%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 334%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 364%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 400%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 434%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 464%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 500%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 534%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 564%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 600%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 634%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 664%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 700%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 734%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 764%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 800%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 834%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 864%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 900%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 934%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 964%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 1000%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 1034%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 1064%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 1100%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 1134%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 1164%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 1200%;" aria-valuenow="34" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 1234%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 1264%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="arrow mx-auto"></div>
                <div class="start-new-game mx-auto text-center">
                    <span>Новая игра через:</span>
                    <b>7 сек</b>
                </div>
            </div>
        </div>
        <div class="jackpot-bet-form">
            <input type="text" class="form-control mx-auto" placeholder="Введите сумму" v-model="amount">
            <div class="balance ml-lg-5">Ваш баланс: {{currentAmount}}</div>
            <a class="btn btn-lg float-lg-right mx-auto" v-on:click="takeButton()">Сделать ставку!</a>
        </div>
        <div class="jackpot-players">
            <div class="player" v-for="ratePlayer in ratePlayers">
                <div class="player-avatar">
                    <img v-bind:src="[ratePlayer.image]">
                </div>
                <div class="player-info">
                    <div class="name">
                        {{ratePlayer.name}}
                    </div>
                    <div class="bet">
                        Поставил: <b>{{ratePlayer.amount}} <i class="fa fa-rub"></i></b>
                    </div>
                    <div class="ticket">
                        <span>Билет:</span>
                        #{{ratePlayer.ticketRanges}}
                    </div>
                    <div class="percent">
                        {{ratePlayer.percent}}%
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "JackpotGameRoom",

        data: function () {
            return {
                roomNumber: 0,
                amount: 1,
                currentJackpot: 0,
                currentAmount: 0,
                winResult: [],
                ratePlayers: [],
            }
        },
        mounted() {
            this.roomNumber = this.$route.path.substring(this.$route.path.length - 1);

            this.getPlayerRate();

            this.startConnectToChannel();

            this.getLastJackpotAndWinner();

            this.getCurrentJackpot();
        },
        beforeDestroy() {

        },
        methods: {
            startConnectToChannel: function () {
                switch (this.roomNumber) {
                    case '1':
                        this.startChannel('JackpotFirstChannel', 'JackpotFirstEvent');
                        this.startRateChannel('JackpotRateFirstChannel', 'JackpotRateFirstEvent');
                        break;
                    case '2':
                        this.startChannel('JackpotSecondChannel', 'JackpotSecondEvent');
                        this.startRateChannel('JackpotRateSecondChannel', 'JackpotRateSecondEvent');
                        break;
                    case '3':
                        this.startChannel('JackpotThirdChannel', 'JackpotThirdEvent');
                        this.startRateChannel('JackpotRateThirdChannel', 'JackpotRateThirdEvent');
                        break;
                    default:
                        return;
                }

            },
            startChannel: function (nameChannel, nameEvent) {
                window.Echo.channel(nameChannel)
                    .listen(nameEvent, (e) => {
                        //  this.getAnimation();

                        if (e['name'] !== null || e['winAmount'] !== null || e['ticketWin'] !== null) {
                            this.winPlayer(e['name'], e['winAmount'], e['ticketWin']);

                            this.currentJackpot = 0;
                            this.ratePlayers = [];
                            this.currentAmount = 0;
                        }
                    });
            },
            startRateChannel: function (nameChannel, nameEvent) {
                window.Echo.channel(nameChannel)
                    .listen(nameEvent, (e) => {
                        this.addNewPlayer(e['image'], e['name'], e['amount'], e['tickets']);
                        this.currentJackpot += Number(e['amount']);
                    });
            },
            takeButton: function () {
                let app = this;

                axios.post('/setBetJackpot', {
                    amount: this.amount,
                    roomNumber: this.roomNumber,
                })
                    .then(function (resp) {
                        app.currentAmount += Number(app.amount);
                    });
            },
            getCurrentJackpot: function () {
                let app = this;

                axios.post('/getCurrentJackpot', {
                    roomNumber: this.roomNumber,
                })
                    .then(function (resp) {
                        app.currentJackpot+=resp.data;
                    });
            },
            getPlayerRate: function () {
                let app = this;
                axios.post('/getJackpotRotatePlayers', {
                    roomNumber: this.roomNumber,
                })
                    .then(function (resp) {
                        for (let i = 0; i < resp.data.length; i++) {
                            app.addNewPlayer(resp.data[i].avatar, resp.data[i].name, resp.data[i].amount, (resp.data[i].tickets_min_range + '-' + resp.data[i].tickets_max_range), 3)
                        }
                    });
            },
            getLastJackpotAndWinner: function () {
                let app = this;
                axios.post('/getLastJackpotAndWinner', {
                    roomNumber: this.roomNumber,
                })
                    .then(function (resp) {
                        if (resp.data.length != 0) {
                            app.winResult.push({
                                winName: resp.data.player.name,
                                winAmount: resp.data.lastSum,
                                winTicket: resp.data.game.game_number,
                            });
                        }
                        else{
                            app.winResult.push({
                                winName: '',
                                winAmount: 0,
                                winTicket: 0,
                            });
                        }
                    });
            },
            winPlayer: function (name, winAmount, winTicket) {
                this.winResult.pop();
                this.winResult.push({
                    winName: name,
                    winAmount: winAmount,
                    winTicket: winTicket,
                });
            },
            addNewPlayer: function (image, name, amount, ticketRanges, percent,) {
                this.ratePlayers.push({
                    image: image,
                    name: name,
                    amount: amount,
                    ticketRanges: ticketRanges,
                    percent: percent,
                });
            },
            getAnimation: function () {
                let prog = document.getElementsByClassName('progress')[0];
                console.log(prog);
                prog.setAttribute('style', 'margin-left: -1052.34%; transition: all 5s cubic-bezier(0.51, 0.18, 0.22, 1) 0s;');
            }
            /*
            *42["jackpot_bets",
            * {
            *   "data":[
            *       {
            *           "owner": {
            *               "_id":"5d3e7715b7849d0b1dd19313",
            *               "photo":"https://pp.userapi.com/c856132/v856132782/49eb8/2-vDWizwMeY.jpg?ava=1",
            *               "first_name":"Никита",
            *               "last_name":"Гапонов"
            *           },
            *           "amount":100,
            *           "startTicket":0,
            *           "endTicket":99,
            *           "percent":28.57142857142857,
            *           "color":"005d2a"
            *       },
            *       {
            *           "owner":{
            *               "_id":"5cc83e7a364df77f572bd390",
            *               "photo":"https://sun6-19.userapi.com/c858036/v858036232/16a4b/UU1SQIjzMug.jpg?ava=1",
            *               "first_name":"Иван",
            *               "last_name":"Поднебесный"
            *           },
            *           "amount":250,
            *           "startTicket":100,
            *           "endTicket":349,
            *           "percent":71.42857142857143,
            *           "color":"f7905d"
            *        }
            *   ],
            *   "room":"classic"
            * }]
            *
            * 42["jackpot_roll",
            * {
            *   "offset":1107.2266333123687,
            *   "room_name":"classic"
            * }]
            *
            * 42["jackpot_bars",
            * {
            *   "data":[
            *       {
            *           "color":"f700c3",
            *           "percent":0.2178649237472767
            *       },
            *       {
            *           "color":"9190f6",
            *           "percent":2.3965141612200433
            *       },
            *       {
            *           "color":"f7905d",
            *           "percent":43.57298474945534
            *       }
            *   ],
            *   "room":"classic"
            * }]
            */
        }
    }
</script>

<style scoped>

</style>
