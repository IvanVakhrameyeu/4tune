<template>
    <div class="double">
        <div class="double-history">
            <span>История игр:</span>
            <div class="history">
                <div v-for="history in histories">
                    <p v-bind:class="[getColor(history.game_number)]">{{history.game_number}}</p>
                </div>
            </div>
        </div>
        <div class="double-wheel">
            <div class="wheel-block mx-auto">
                <b class="wheel-number red mx-auto">{{rotateNumber}}</b>
                <span v-html=styleRotateZ> </span>
            </div>
        </div>
        <div class="double-bet-form">
            <input type="text" v-model="amount" v-on:change="checkAmount"
                   class="form-control mx-auto" placeholder="Введите сумму">
            <div class="bet-buttons float-lg-right text-lg-right">
                <a v-on:click="add(1)" class="btn btn-sm">+1</a>
                <a v-on:click="add(10)" class="btn btn-sm">+10</a>
                <a v-on:click="add(100)" class="btn btn-sm">+100</a>
                <a v-on:click="add(1000)" class="btn btn-sm">+1000</a>
                <br>
                <a v-on:click="reduce(1)" class="btn btn-sm">-1</a>
                <a v-on:click="reduce(10)" class="btn btn-sm">-10</a>
                <a v-on:click="reduce(100)" class="btn btn-sm">-100</a>
                <a v-on:click="reduce(1000)" class="btn btn-sm">-1000</a>
            </div>
        </div>
        <div class="double-bets">
            <div class="row">
                <div class="col-lg-4">
                    <div class="bet-block mx-auto">
                        <div class="bet-head red" v-on:click="takeButton('red')">
                            Ставка <b>1-7</b>
                            <span>x2</span>
                        </div>

                        <p>Поставлено: <b>0</b></p>

                        <div class="bet-players">
                            <div class="player" v-for="redRate in redRates">
                                <div class="player-avatar">
                                    <img v-bind:src="[redRate.name]">
                                </div>
                                <div class="player-info">
                                    <div class="name">{{redRate.name}}</div>
                                    <div class="bet-sum">{{redRate.sum}} <i class="fa fa-rub"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bet-block mx-auto">
                        <div class="bet-head green" v-on:click="takeButton('green')">
                            Ставка <b>0</b>
                            <span>x14</span>
                        </div>

                        <p>Поставлено: <b>0</b></p>

                        <div class="bet-players">
                            <div class="player" v-for="greenRate in greenRates">
                                <div class="player-avatar">
                                    <img v-bind:src="[greenRate.name]">
                                </div>
                                <div class="player-info">
                                    <div class="name">{{greenRate.name}}</div>
                                    <div class="bet-sum">{{greenRate.sum}} <i class="fa fa-rub"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bet-block mx-auto">
                        <div class="bet-head black" v-on:click="takeButton('black')">
                            Ставка <b>8-14</b>
                            <span>x2</span>
                        </div>

                        <p>Поставлено: <b>0</b></p>
                        <div class="bet-players">
                            <div class="player" v-for="blackRate in blackRates">
                                <div class="player-avatar">
                                    <img v-bind:src="[blackRate.name]">
                                </div>
                                <div class="player-info">
                                    <div class="name">{{blackRate.name}}</div>
                                    <div class="bet-sum">{{blackRate.sum}} <i class="fa fa-rub"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import * as autobahn from "autobahn";


    export default {
        name: "DoubleGameComponent",
        data: function () {
            return {
                rotateZ: 0,
                rotateNumber: 0,
                styleRotateZ: '',
                amount: 1,
                color: '',
                redRates: [],
                blackRates: [],
                greenRates: [],
                histories: [],
            }
        },
        mounted() {
            this.getHistories();
            this.getAnimation();

            this.startWebSocket();
            this.startRateChannel(); //channel rate

            this.getPlayerRate();

            this.rotateNumber = 0;
        },
        beforeDestroy() {
            window.Echo.channel(`DoubleChannel`)
                .stopListening('DoubleEvent');

            window.Echo.channel(`DoubleRateChannel`)
               .stopListening('DoubleRateEvent');
        },
        methods: {
            startWebSocket: function () {
                window.Echo.channel(`DoubleChannel`)
                    .listen('DoubleEvent', (e) => {
                        this.rotateNumber = e['rotation'];
                        this.getAnimation();
                        this.addNewHistory(this.rotateNumber);

                        this.greenRates=[];
                        this.blackRates=[];
                        this.redRates=[];
                    });
            },
            startRateChannel: function () {
                window.Echo.channel(`DoubleRateChannel`)
                    .listen('DoubleRateEvent', (e) => {
                        this.addNewPlayer(e['image'], e['name'], e['amount'], e['color']);
                    });
            },
            takeButton: function (color) {
                this.color = color;
                let app = this;

                axios.post('/setBetDouble', {
                    amount: this.amount,
                    color: this.color
                })
                    .then(function (resp) {

                    });
            },
            getPlayerRate: function () {
                let app = this;
                axios.post('/getRotatePlayers', {})
                    .then(function (resp) {
                        for (let i = 0; i < resp.data[0].length; i++) {
                            let j = 0;
                            if (resp.data[0][i].user_id != resp.data[1][j].id) {
                                j++;
                            }
                            app.addNewPlayer(resp.data[1][j].avatar, resp.data[1][j].name, resp.data[0][i].amount, resp.data[0][i].anticipated_event)
                        }
                    });
            },
            getHistories: function () {
                let app = this;
                axios.get('/getHistories')
                    .then(function (resp) {
                        app.histories = resp.data;
                    });
            },
            getColor: function (number) {
                switch (number) {
                    case 0:
                        return 'green';
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                        return 'red';
                    default:
                        return 'black';
                }
            },
            getAnimation: function () {
                this.rotateZ = this.getPosition(this.rotateNumber);
                this.styleRotateZ = '<div class="wheel mx-auto" style="transform: rotateZ(' + this.rotateZ + 'deg);"></div>';

            },
            getPosition: function (number) {
                switch (number) {
                    case 0:
                        this.rotateZ = 0;
                        break;
                    case 1:
                        this.rotateZ = -25;
                        break;
                    case 2:
                        this.rotateZ = -73.5;
                        break;
                    case 3:
                        this.rotateZ = -120;
                        break;
                    case 4:
                        this.rotateZ = -167.5;
                        break;
                    case 5:
                        this.rotateZ = -215;
                        break;
                    case 6:
                        this.rotateZ = -263;
                        break;
                    case 7:
                        this.rotateZ = -312;
                        break;
                    case 8:
                        this.rotateZ = -50;
                        break;
                    case 9:
                        this.rotateZ = -94;
                        break;
                    case 10:
                        this.rotateZ = -144;
                        break;
                    case 11:
                        this.rotateZ = -191;
                        break;
                    case 12:
                        this.rotateZ = -239;
                        break;
                    case 13:
                        this.rotateZ = -286;
                        break;
                    case 14:
                        this.rotateZ = -336;
                        break;
                }
                return this.rotateZ + 360;
            },
            addNewPlayer: function (image, name, amount, color) {
                switch (color) {
                    case 'green':
                        for (let i = 0; i <this.greenRates.length; i++){
                            if(this.greenRates[i]['name']==name){
                                this.greenRates[i]['sum']+=amount;
                                return;
                            }
                        }
                        this.greenRates.push({image: image, name: name, sum: amount});
                        break;
                    case 'black':
                        for (let i = 0; i <this.blackRates.length; i++){
                            if(this.blackRates[i]['name']==name){
                                this.blackRates[i]['sum']+=amount;
                                return;
                            }
                        }
                        this.blackRates.push({image: image, name: name, sum: amount});
                        break;
                    case 'red':
                        for (let i = 0; i <this.redRates.length; i++){
                            if(this.redRates[i]['name']==name){
                                this.redRates[i]['sum']+=amount;
                                return;
                            }
                        }
                        this.redRates.push({image: image, name: name, sum: amount});
                        break;
                }
            },
            addNewHistory: function (number) {
                this.histories.splice(9, 1);
                this.histories = this.histories.reverse();
                this.histories.push({game_number: number});
                this.histories = this.histories.reverse();
            },
            add: function (amount) {
                let min = 0;
                let max = 14;
                let rand = Math.floor(Math.random() * (max - min + 1) + min);
                this.getAnimation(this.getPosition(rand));

                this.amount += parseInt(amount);
                if (parseInt(this.amount) > 1000) {
                    this.amount = 1000;
                }
            },
            reduce: function (amount) {
                this.amount -= parseInt(amount);
                if (parseInt(this.amount) <= 0) {
                    this.amount = 1;
                }
            },
            checkAmount: function () {
                if (isNaN(this.amount)) {
                    this.amount = 1;
                } else {
                    if (parseInt(this.amount) > 1000) {
                        this.amount = 1000;
                    } else {
                        if (parseInt(this.amount) <= 0) {
                            this.amount = 1;
                        }
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>
