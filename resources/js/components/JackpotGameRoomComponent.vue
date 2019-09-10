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
                    <div class="progress"
                         v-bind:style="styleAnimation">

                        <div class="overdiv"></div>
                        <template v-for="currentHTML in sortArray(arrayHTML)">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                 role="progressbar"
                                 aria-valuemin="0" aria-valuemax="100"
                                 v-bind:style="currentHTML.background_color + currentHTML.width+ currentHTML.left"></div>
                        </template>


                    </div>
                </div>
                <div class="arrow mx-auto"></div>
                <div class="start-new-game mx-auto text-center">
                    <span>Новая игра через:</span>
                    <b>{{currentTime}} сек</b>
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

                currentTime: 5,

                arrayHTML: [],
                arrayPercent: [],

                styleAnimation: '',
            }
        },
        mounted() {
            this.styleAnimation = 'transform: translateX(0%); transition: all 5s cubic-bezier(0.51, 0.18, 0.22, 1) 0s;';
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

                        let winner = e['arrayValueMessage'];

                        if (typeof (winner['timer']) !== "undefined") {
                            this.currentTime = e['arrayValueMessage']['timer'];
                            return;
                        }

                        if (winner['name'] !== null || winner['winAmount'] !== null || winner['ticketWin'] !== null) {
                            let percentShift = Number(winner['ticketWin']);
                            let shiftNumber = this.getShiftNumber(percentShift);
                            this.getAnimation(shiftNumber);

                            this.sleep(15000).then(() => {
                                this.winPlayer(winner['name'], winner['winAmount'], winner['ticketWin']);

                                this.currentJackpot = 0;
                                this.ratePlayers = [];
                                this.currentAmount = 0;
                                this.currentTime = 10;
                                this.arrayHTML = [];
                                this.styleAnimation = 'transform: translateX(0%); transition: all 5s cubic-bezier(0.51, 0.18, 0.22, 1) 0s;';

                            });
                        }
                    });
            },
            sleep: function (time) {
                return new Promise((resolve) => setTimeout(resolve, time));
            },
            startRateChannel: function (nameChannel, nameEvent) {
                window.Echo.channel(nameChannel)
                    .listen(nameEvent, (e) => {
                        this.addNewPlayer(e['image'], e['name'], e['amount'], e['tickets'], (e['arrayPercent'][e['arrayPercent'].length - 1]).toFixed(1));
                        this.currentJackpot += Number(e['amount']);

                        this.arrayPercent = e['arrayPercent'];

                        this.changePercent(this.arrayPercent);

                        let lengthArray = Number(this.arrayHTML.length);


                        if (lengthArray != 0) { // fixing
                            for (let i = 4; i > 0; i--) {
                                this.createArrayHTML(this.randomNumber() + ', ' + this.randomNumber() + ', ' + this.randomNumber(),
                                    (this.arrayPercent[this.arrayPercent.length - 1]).toFixed(3),
                                    (this.arrayHTML[lengthArray - i].percent + (this.arrayPercent[this.arrayPercent.length - 1])).toFixed(3));
                            }
                        } else {
                            for (let i = 0; i < 4; i++) {
                                this.createArrayHTML(this.randomNumber() + ', ' + this.randomNumber() + ', ' + this.randomNumber(),
                                    (this.arrayPercent[this.arrayPercent.length - 1]).toFixed(3),
                                    (i * 100));
                            }
                        }
                        this.changeHTMLPercent();
                    });
            },
            changeHTMLPercent: function () {
                let lengthArray = Number(this.arrayHTML.length);
                let lengthArrayPercent = Number(this.arrayPercent.length);

                for (let i = 0; i < 4; i++) {
                    this.arrayHTML[i].width = 'width: ' + this.arrayPercent[0].toFixed(1) + '%; ';
                    this.arrayHTML[i].widthNumber = Number(this.arrayPercent[0].toFixed(1));
                }
                if (lengthArray < 5) {
                    return;
                }
                for (let i = 1; i < lengthArrayPercent; i++) {
                    for (let j = 0; j < 4; j++) {

                        let width = 'width: ' + (this.arrayPercent[i]).toFixed(1) + '%; ';
                        let leftNumber = Number((this.arrayHTML[i * 4 - 4 + j].percent).toFixed(1)) + Number((this.arrayHTML[i * 4 - 4 + j].widthNumber));
                        let withNumber = (this.arrayPercent[i]).toFixed(1);
                        let left = 'left: ' + leftNumber + '%;';


                        this.arrayHTML[i * 4 + j].width = width;
                        this.arrayHTML[i * 4 + j].left = left;
                        this.arrayHTML[i * 4 + j].percent = leftNumber;
                        this.arrayHTML[i * 4 + j].widthNumber = withNumber;
                    }
                }
            },
            takeButton: function () { // add error message when player have't enough money
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
                        app.currentJackpot += resp.data;
                    });
            },
            getPlayerRate: function () {
                let app = this;
                axios.post('/getJackpotRotatePlayers', {
                    roomNumber: this.roomNumber,
                })
                    .then(function (resp) {
                        for (let i = 0; i < resp.data['players'].length; i++) {
                            app.addNewPlayer(resp.data['players'][i].avatar,
                                resp.data['players'][i].name,
                                resp.data['players'][i].amount,
                                (resp.data['players'][i].tickets_min_range + '-' + resp.data['players'][i].tickets_max_range),
                                (resp.data['percent'][i]).toFixed(1));

                        }
                        if (resp.data['percent'].length !== 0) {
                            app.addToArrayHTML(resp.data['percent']);
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
                        } else {
                            app.winResult.push({
                                winName: '',
                                winAmount: 0,
                                winTicket: 0,
                            });
                        }
                    });
            },
            getShiftNumber: function (winNumber) {
                for (let i = 0; i < this.ratePlayers.length; i++) {
                    let result = this.ratePlayers[i].ticketRanges.split('-');
                    if (Number(result[0]) <= Number(winNumber) && Number(result[1]) >= Number(winNumber)) {

                        return (this.arrayHTML[i * 4 + 3].percent - 50);
                    }
                }
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
            addToArrayHTML: function (arrayPercent) {
                let background_color = this.randomNumber() + ', ' + this.randomNumber() + ', ' + this.randomNumber();
                for (let j = 0; j < 4; j++) {
                    this.createArrayHTML(background_color,
                        (arrayPercent[0]).toFixed(1),
                        (j * 100)
                    );
                }
                for (let i = 1; i < arrayPercent.length; i++) {
                    background_color = 'background-color: rgb(' + this.randomNumber() + ', ' + this.randomNumber() + ', ' + this.randomNumber() + '); ';

                    for (let j = 0; j < 4; j++) {
                        let width = 'width: ' + (arrayPercent[i]).toFixed(1) + '%; ';
                        let leftNumber = Number((this.arrayHTML[i * 4 - 4 + j].percent).toFixed(1)) + Number((this.arrayHTML[i * 4 - 4 + j].widthNumber));
                        let withNumber = (arrayPercent[i]).toFixed(1);
                        let left = 'left: ' + leftNumber + '%;';

                        this.arrayHTML.push({
                            background_color: background_color,
                            width: width,
                            left: left,
                            percent: leftNumber,
                            widthNumber: withNumber,
                        });
                    }
                }
            },
            createArrayHTML: function (colorNumber, width, left) {
                this.arrayHTML.push({
                    background_color: 'background-color: rgb(' + colorNumber + '); ',
                    width: 'width: ' + width + '%; ',
                    left: 'left: ' + left + '%;',
                    percent: Number(left),
                    widthNumber: Number(width),
                });
            },
            sortArray: function (arr) {
                return arr.slice().sort(function (a, b) {
                    return a.percent - b.percent;
                });

            },
            getAnimation: function (percentShift) {
                this.styleAnimation = 'transform: translateX(-' + percentShift + '%); transition: all 5s cubic-bezier(0.51, 0.18, 0.22, 1) 0s;';
            },
            changePercent: function (arrayPercent) {
                for (let i = 0; i < arrayPercent.length; i++) {
                    this.ratePlayers[i].percent = arrayPercent[i].toFixed(1);
                }
            },
            randomNumber: function () {
                return Math.floor(Math.random() * (255 - 1 + 1)) + 1;
            },

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
        },

    }
</script>

<style scoped>

</style>
