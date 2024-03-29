@extends('games')
@section('game')
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
                    <div class="progress">
                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                             style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                             aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                             role="progressbar" style="width: 36%" aria-valuenow="36" aria-valuemin="0"
                             aria-valuemax="100"></div>
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
                <a href="#" class="btn btn-lg float-lg-right mx-auto">Сделать ставку!</a>
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
    </div>
@endsection
