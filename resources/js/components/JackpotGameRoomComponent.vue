<template>
    <div class="room">
        <div class="jackpot-info">
            <h4 class="text-center mx-auto">Джекпот сейчас: <b>3570 <i class="fa fa-rub"></i></b></h4>
            <div class="win-info">
                <div class="winner">
                    <b>Победил:</b> Кирилл Валевский
                </div>
                <div class="ticket">
                    <b>Билет:</b> #180
                </div>
                <div class="win-sum">
                    Выигрыш: <b>7135 <i class="fa fa-rub"></i></b>
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
                             style="width: 34%; left: 0%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 34%" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 64%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 100%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 134%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 164%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 200%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 234%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 264%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 300%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 334%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 364%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 400%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 434%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 464%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 500%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 534%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 564%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 600%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 634%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 664%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 700%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 734%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 764%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 800%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 834%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 864%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 900%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 934%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 964%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 1000%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 1034%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 1064%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 1100%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%; left: 1134%;" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%; left: 1164%;" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>

                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%; left: 1200%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
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
            <input type="text" class="form-control mx-auto" placeholder="Введите сумму">
            <div class="balance ml-lg-5">Ваш баланс: 0</div>
            <a class="btn btn-lg float-lg-right mx-auto" v-on:click="scroll">Сделать ставку!</a>
        </div>
        <div class="jackpot-players">
            <div class="player">
                <div class="player-avatar">
                    <img src="images/test-avatar.png">
                </div>
                <div class="player-info">
                    <div class="name">
                        Владимир Кузнецов
                    </div>
                    <div class="bet">
                        Поставил: <b>500 <i class="fa fa-rub"></i></b>
                    </div>
                    <div class="ticket">
                        <span>Билет:</span>
                        #5511-6511
                    </div>
                    <div class="percent">
                        10%
                    </div>
                </div>
            </div>
            <div class="player">
                <div class="player-avatar">
                    <img src="images/test-avatar.png">
                </div>
                <div class="player-info">
                    <div class="name">
                        Владимир Кузнецов
                    </div>
                    <div class="bet">
                        Поставил: <b>500 <i class="fa fa-rub"></i></b>
                    </div>
                    <div class="ticket">
                        <span>Билет:</span>
                        #5511-6511
                    </div>
                    <div class="percent">
                        10%
                    </div>
                </div>
            </div>
            <div class="player">
                <div class="player-avatar">
                    <img src="images/test-avatar.png">
                </div>
                <div class="player-info">
                    <div class="name">
                        Владимир Кузнецов
                    </div>
                    <div class="bet">
                        Поставил: <b>500 <i class="fa fa-rub"></i></b>
                    </div>
                    <div class="ticket">
                        <span>Билет:</span>
                        #5511-6511
                    </div>
                    <div class="percent">
                        10%
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "JackpotGameRoom",

    /*
            data: function () {
                return {            }
            },*/
    mounted() {

       // alert(window.location.pathname);
    },
        beforeDestroy() {

        },
        methods: {
            scroll() {
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
