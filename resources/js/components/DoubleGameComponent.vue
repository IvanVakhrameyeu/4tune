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
                <b class="wheel-number red mx-auto">1</b>
                <div class="wheel mx-auto"></div>
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
    export default {
        name: "DoubleGameComponent",
        data: function () {
            return {
                amount: 1,
                color: '',
                conn: null,
                redRates: [],
                blackRates: [],
                greenRates: [],
                histories: [],
            }
        },
        mounted() {
            this.getHistories();
            this.startWebSocket();

            this.getPlayerRate();

        },
        methods: {
            startWebSocket: function () {
                this.conn = new WebSocket('ws://localhost:8080');
                this.conn.onopen = function (e) {
                    console.log('onopen');
                };
                this.conn.onmessage = function (e) {
                    console.log('onmessage' + e.data);
                };
            },
            takeButton: function (color) {
                this.color = color;
                let app = this;

                console.log(this);
                axios.post('/setBetDouble', {
                    amount: this.amount,
                    color: this.color
                })
                    .then(function (resp) {

                    });
            },
            getPlayerRate: function () {
                this.blackRates.push({image: 'images/images/test-avatar.png', name: 'Ivan', sum: 32});
                this.blackRates.push({image: 'images/test-avatar.png', name: 'Ivan1', sum: 132});
                this.blackRates.push({image: 'images/test-avatar.png', name: 'Ivan2', sum: 232});
                this.redRates.push({image: 'images/test-avatar.png', name: 'Ivan3', sum: 332});
                this.redRates.push({image: 'images/test-avatar.png', name: 'Ivan4', sum: 432});
                this.greenRates.push({image: 'images/test-avatar.png', name: 'Ivan5', sum: 532});
            },
            getHistories: function () {
                let app = this;
                console.log(this);
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
            addNewStory: function (number) {
                this.histories.splice(0, 1);
                this.histories.push({ game_number: number});
            },
            add: function (amount) {
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
