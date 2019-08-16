<template>
    <div class="nvuti">
        <div class="row">
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Размер игры</span>
                    <input type="text" id="count_game" class="form-control nvuti-amount" v-on:change="amountInput"
                           v-model="amount">
                    <div class="size-buttons">
                        <a v-on:click="amountInput('double')" class="btn">Удвоить</a>
                        <a v-on:click="amountInput('half')" class="btn ml-auto">1/2</a>
                        <a v-on:click="amountInput('min')" class="btn">Минимум</a>
                        <a v-on:click="amountInput('max')" class="btn ml-auto">Макс</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Шанс игры %</span>
                    <input type="text" id="chance_game" class="form-control nvuti-chance" v-on:change="changeInput"
                           v-model="chance">
                    <div class="chance-buttons">
                        <a v-on:click="changeInput('double')" class="btn nvuti-chance-double">Удвоить</a>
                        <a v-on:click="changeInput('half')" class="btn ml-auto">1/2</a>
                        <a v-on:click="changeInput('min')" class="btn">Минимум</a>
                        <a v-on:click="changeInput('max')" class="btn ml-auto">Макс</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="game-side mx-auto">
                    <b class="nvuti-win">{{possibleWin}} N</b>
                    <span>Возможный выигрыш</span>
                    <div class="buttons">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="nvuti-min">{{this.leftRange}}</p>
                                <a v-on:click="starting('less')" class="btn nvuti-btn" about="less">Меньше</a>
                            </div>
                            <div class="col-lg-6">
                                <p class="nvuti-max">{{this.rightRange}}</p>
                                <a v-on:click="starting('more')" class="btn nvuti-btn"
                                   about="more">Больше</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hash text-center">
                    <h4 class="mx-auto text-center">Hash игры</h4>
                    <p class="hash-value">
                        {{this.hash}}
                    </p>
                    <a href="#" class="whatis mx-auto">Что такое hash</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Toasted from 'vue-toasted';
    import * as Vue from "vue";

    Vue.use(Toasted);

    export default {

        name: "NvutiGameComponent",
        modules: [
            '@nuxtjs/toast',
        ],

        mounted() {

            this.newHash();
        },
        created() {
            this.updateHashWithSetInterval();
        },
        beforeDestroy() {
            clearInterval(this.polling);
        },

        data: function () {
            return {
                chance: 95,
                amount: 1,
                possibleWin: 1.05,
                hash: null,
                leftRange: "0 - 949999",
                rightRange: "49999 - 999999",
                polling: null,
                WonOrLose: '',
                money: '',
            }
        },

        methods: {
            changeInput: function (type) {
                switch (type) {
                    case "double":
                        this.chance *= 2;
                        break;
                    case "half":
                        this.chance /= 2;
                        break;
                    case "min":
                        this.chance = 1;
                        break;
                    case "max":
                        this.chance = 95;
                        break;
                    default:
                        if (isNaN(parseInt(this.chance))) {
                            this.chance = 95;
                        } else {
                            this.chance = parseInt(this.chance);
                        }
                }
                this.chance = parseInt(this.chance);
                this.chance > 95 ? this.chance = 95 : null;

                if (this.chance < 1 || isNaN(this.chance)) {
                    this.chance = 1;
                }
                this.changePossibleWin();
                this.changeRange();
            },
            amountInput: function (type) {
                switch (type) {
                    case "double":
                        this.amount *= 2;
                        break;
                    case "half":
                        this.amount /= 2;
                        break;
                    case "min":
                        this.amount = 1;
                        break;
                    case "max":
                        this.amount = 1000;
                        break;
                    default:
                        if (isNaN(parseFloat(this.amount))) {
                            this.amount = 1;
                        } else {
                            this.amount = Math.round(parseFloat(this.amount) * 100) / 100;
                        }
                }
                this.amount > 1000 ? this.amount = 1000 : null;

                if (this.amount < 1 || isNaN(this.amount)) {
                    this.amount = 1;
                }
                this.changePossibleWin();
            },
            changePossibleWin: function () {
                this.possibleWin = this.amount / this.chance * 100;
                this.possibleWin = Math.round(parseFloat(this.possibleWin) * 100) / 100;
            },
            changeRange: function () {
                this.leftRange = '0 - ' + (Math.floor(parseFloat(this.chance) / 100 * 999999));
                this.rightRange = (Math.floor(999999 - parseFloat(this.chance) / 100 * 999999)) + ' - 999999';
            },
            starting: function (stake) {
                let app = this;

                console.log(this);
                axios.post('/setBet', {
                    chance: this.chance,
                    amount: this.amount,
                    stake: stake
                })
                    .then(function (resp) {
                        app.hash = resp.data['hash'];
                        app.WonOrLose = resp.data['WonOrLose'];
                        app.money = resp.data['money'];
                       // this.getUpdateUser();
                      //  this.getResult(this.WonOrLose, this.money);
                    });

            },
            getUpdateUser: function () {
                let app = this;
                console.log(this);
                axios.get('/getUser')
                    .then(function (resp) {
                        app.localStorage.user = resp.data;
                        app.user = resp.data;
                    });
            },
            updateHashWithSetInterval: function () {
                this.polling = setInterval(() => {
                    this.newHash();
                }, 120000);
            },
            newHash: function () {
                let app = this;
                console.log(this);
                axios.get('/getHash')
                    .then(function (resp) {
                        app.hash = resp.data;
                    })
            },
            getResult: function (result, amount) {
                Vue.toasted.show(result + ' ' + amount, {
                    theme: "toasted-primary",
                    position: "bottom-center",
                    duration: 2000
                });
            }
        }
    }
</script>

<style scoped>

</style>
