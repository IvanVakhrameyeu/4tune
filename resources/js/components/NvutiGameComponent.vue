<template>
    <div class="nvuti">
        <div class="row">
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Размер игры</span>
                    <input type="text" id="count_game" class="form-control nvuti-amount" v-on:change="amount_input"
                           v-model="amount">
                    <div class="size-buttons">
                        <a v-on:click="amount_input('double')" class="btn">Удвоить</a>
                        <a v-on:click="amount_input('half')" class="btn ml-auto">1/2</a>
                        <a v-on:click="amount_input('min')" class="btn">Минимум</a>
                        <a v-on:click="amount_input('max')" class="btn ml-auto">Макс</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Шанс игры %</span>
                    <input type="text" id="chance_game" class="form-control nvuti-chance" v-on:change="change_input"
                           v-model="chance">
                    <div class="chance-buttons">
                        <a v-on:click="change_input('double')" class="btn nvuti-chance-double">Удвоить</a>
                        <a v-on:click="change_input('half')" class="btn ml-auto">1/2</a>
                        <a v-on:click="change_input('min')" class="btn">Минимум</a>
                        <a v-on:click="change_input('max')" class="btn ml-auto">Макс</a>
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
                                <p class="nvuti-min">0 - 949999</p>
                                <a class="btn nvuti-btn" about="less">Меньше</a>
                            </div>
                            <div class="col-lg-6">
                                <p class="nvuti-max">49999 - 999999</p>
                                <a class="btn nvuti-btn" about="more">Больше</a>
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
                        {{}}
                    </p>
                    <a href="#" class="whatis mx-auto">Что такое hash</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NvutiGameComponent",


        data: function () {
            return {
                chance: 95,
                amount: 1,
                possibleWin: 1.05,
            }
        },

        methods: {
            change_input: function (type) {
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
                this.possible_win();
            },
            amount_input: function (type) {
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
                            this.amount = Math.round(parseFloat(this.amount)*100)/100;
                        }
                }
                this.amount > 1000 ? this.amount = 1000 : null;

                if (this.amount < 1 || isNaN(this.amount)) {
                    this.amount = 1;
                }
               this.possible_win();
            },
            possible_win: function () {
                this.possibleWin=this.amount/ this.chance * 100;
                this.possibleWin=Math.round(parseFloat(this.possibleWin)*100)/100;
            }
        }
    }
</script>

<style scoped>

</style>
