<template>
    <div class="double">
        <div class="double-history">
            <span>История игр:</span>
            <div class="history">
                <p v-bind:class="[history[0].color]">{{history[0].number}}</p>
                <p v-bind:class="[history[1].color]">{{history[1].number}}</p>
                <p v-bind:class="[history[2].color]">{{history[2].number}}</p>
                <p v-bind:class="[history[3].color]">{{history[3].number}}</p>
                <p v-bind:class="[history[4].color]">{{history[4].number}}</p>
                <p v-bind:class="[history[5].color]">{{history[5].number}}</p>
                <p v-bind:class="[history[6].color]">{{history[6].number}}</p>
                <p v-bind:class="[history[7].color]">{{history[7].number}}</p>
                <p v-bind:class="[history[8].color]">{{history[8].number}}</p>
                <p v-bind:class="[history[9].color]">{{history[9].number}}</p>
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
                            <div class="player">
                                <div class="player-avatar">
                                    <img src="images/test-avatar.png">
                                </div>
                                <div class="player-info">
                                    <div class="name">Name</div>
                                    <div class="bet-sum">100 <i class="fa fa-rub"></i></div>
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
                            <div class="player">
                                <div class="player-avatar">
                                    <img src="images/test-avatar.png">
                                </div>
                                <div class="player-info">
                                    <div class="name">Name</div>
                                    <div class="bet-sum">100 <i class="fa fa-rub"></i></div>
                                </div>
                            </div>
                            <div class="player">
                                <div class="player-avatar">
                                    <img src="images/test-avatar.png">
                                </div>
                                <div class="player-info">
                                    <div class="name">Name</div>
                                    <div class="bet-sum">100 <i class="fa fa-rub"></i></div>
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
                            <div class="player">
                                <div class="player-avatar">
                                    <img src="images/test-avatar.png">
                                </div>
                                <div class="player-info">
                                    <div class="name">Name</div>
                                    <div class="bet-sum">100 <i class="fa fa-rub"></i></div>
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
                history: [
                    {color: 'red', number: 1},
                    {color: 'red', number: 2},
                    {color: 'red', number: 3},
                    {color: 'red', number: 4},
                    {color: 'red', number: 5},
                    {color: 'red', number: 6},
                    {color: 'red', number: 7},
                    {color: 'black', number: 8},
                    {color: 'black', number: 9},
                    {color: 'green', number: 0},
                ],

            }
        },
        mounted() {
            this.getHistory();
        },
        methods: {
            takeButton: function(color){
                this.color=color;
                let app = this;

                console.log(this);
                axios.post('/setBetDouble', {
                    amount: this.amount,
                    color: this.color
                })
                    .then(function (resp) {

                    });
            },
            getHistory: function () {

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
