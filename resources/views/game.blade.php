
@extends('header')
@section('content')
<body class="full">
<main>
    <div class="game-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="game">
                        <div class="select-mode-bar">
                            <h5 class="text-center">Выбор режима:</h5>
                            <div class="row">
                                <div class="col-lg-4 text-center">
                                    <a href="#" class="btn">Double</a>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <a href="#" class="btn active">Jackpot</a>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <a href="#" class="btn">Nvuti</a>
                                </div>
                            </div>
                        </div>
                        <div class="game-zone">
                            <div class="jackpot" style="display: none;">
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
                                                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 36%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="double" style="display: none;">
                                <div class="double-history">
                                    <span>История игр:</span>
                                    <div class="history">
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                        <p class="black">12</p>
                                        <p class="green">0</p>
                                        <p class="red">1</p>
                                    </div>
                                </div>
                                <div class="double-wheel">
                                    <div class="wheel-block mx-auto">
                                        <b class="wheel-number red mx-auto">1</b>
                                        <div class="wheel mx-auto"></div>
                                    </div>
                                </div>
                                <div class="double-bet-form">
                                    <input type="text" class="form-control mx-auto" placeholder="Введите сумму">
                                    <div class="bet-buttons float-lg-right text-lg-right">
                                        <a href="#" class="btn btn-sm">+10</a>
                                        <a href="#" class="btn btn-sm">+100</a>
                                        <a href="#" class="btn btn-sm">+10</a>
                                        <a href="#" class="btn btn-sm">+100</a>

                                        <a href="#" class="btn btn-sm">+10</a>
                                        <a href="#" class="btn btn-sm">+100</a>
                                        <a href="#" class="btn btn-sm">+10</a>
                                        <a href="#" class="btn btn-sm">+100</a>
                                    </div>
                                </div>
                                <div class="double-bets">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="bet-block mx-auto">
                                                <div class="bet-head red">
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
                                                <div class="bet-head green">
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
                                                <div class="bet-head black">
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
                                    </div>
                                </div>
                            </div>
                            <div class="nvuti">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="game-size-block mx-auto">
                                            <span>Размер игры</span>
                                            <input type="text" class="form-control" placeholder="1">
                                            <div class="size-buttons">
                                                <a href="#" class="btn">Удвоить</a>
                                                <a href="#" class="btn ml-auto">1/5</a>

                                                <a href="#" class="btn">Минимум</a>
                                                <a href="#" class="btn ml-auto">Макс</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="game-chance-block mx-auto">
                                            <span>Шанс игры %</span>
                                            <input type="text" class="form-control" placeholder="10">
                                            <div class="chance-buttons">
                                                <a href="#" class="btn">Удвоить</a>
                                                <a href="#" class="btn ml-auto">1/5</a>

                                                <a href="#" class="btn">Минимум</a>
                                                <a href="#" class="btn ml-auto">Макс</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="game-side mx-auto">
                                            <b>1.25 N</b>
                                            <span>Возможный выигрыш</span>
                                            <div class="buttons">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>0 - 123456789</p>
                                                        <a href="#" class="btn">Меньше</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>0 - 123456789</p>
                                                        <a href="#" class="btn">Меньше</a>
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
                                                ssgdv65x4v8s4c56cx4v8xc4v38v4cz8xc4v6asz8x4c3z8cx46z8xc46z8c46z84cz68c4z68c46z8c4z6x8c4z6c46z8c4z68c46z84c
                                            </p>
                                            <a href="#" class="whatis mx-auto">Что такое hash</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chat">
                        <div class="chat-content">
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                            <div class="message">
                                <div class="message-head">
                                    <div class="message-avatar">
                                        <img src="images/test-avatar.png">
                                    </div>
                                    <div class="message-user-info">
                                        <div class="name">Name</div>
                                        <div class="id">@144153</div>
                                    </div>
                                </div>
                                <div class="message-text">
                                    Щас ред, точно
                                </div>
                            </div>
                        </div>
                        <div class="chat-form form-inline">
                            <input type="text" class="form-control" placeholder="Напишите что нибудь">
                            <button type="submit" class="btn ml-auto float-lg-right">GO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modals -->
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payModalLabel">Пополнение счета</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pay">
                <div class="input-group">
                    <label for="">Выбор платежной системы</label>
                    <select>
                        <option>My Money</option>
                        <option>UnitPay</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="">Сумма</label>
                    <div class="form-inline">
                        <input type="text" class="form-control" placeholder="500">
                        <button type="submit" class="btn float-lg-right">Пополнить</button>
                    </div>
                </div>

                <h5 class="text-center">История платежей</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>100</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="outModal" tabindex="-1" role="dialog" aria-labelledby="outModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outModalLabel">Вывод средств</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body out">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="#" class="paysystem active mx-auto">
                            <div class="qiwi"></div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="paysystem mx-auto">
                            <div class="webmoney"></div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="paysystem mx-auto">
                            <div class="yandexmoney"></div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="paysystem mx-auto">
                            <div class="card"></div>
                        </a>
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label>Сумма</label>
                        <input type="text" class="form-control" placeholder="100">
                    </div>
                    <div class="form-group">
                        <label>Номер телефона</label>
                        <input type="text" class="form-control" placeholder="+7">
                    </div>

                    <button class="btn mx-auto d-block">Вывод</button>
                </form>

                <h5 class="text-center">История платежей</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Кошелек</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td><i class="fa fa-credit-card"></i> +79179036183</td>
                            <td>100</td>
                            <td><span class="badge badge-warning">Ожидает</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferModalLabel">Перевод средств</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body transfer">
                <form>
                    <div class="form-group">
                        <label>Сумма</label>
                        <input type="text" class="form-control" placeholder="100">
                    </div>
                    <div class="form-group">
                        <label>ID пользователя</label>
                        <input type="text" class="form-control" placeholder="123567">
                    </div>

                    <button class="btn mx-auto d-block">Перевести</button>
                </form>

                <h5 class="text-center">История платежей</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>+100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>+100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>+100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>+100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>+100</td>
                        </tr>
                        <tr>
                            <td>05.10.2010 / 13:00</td>
                            <td>+100</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="referalsModal" tabindex="-1" role="dialog" aria-labelledby="referalsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referalsModalLabel">Рефералы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body referals">
                <h5 class="text-center">Ваша реферальная ссылка: <a href="#">blabla.ru/ref-1</a></h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Регистрация</th>
                            <th>Имя Фамилия</th>
                            <th>Прибыль</th>
                            <th>Последний депозит</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>11111</td>
                            <td>10.10.2010 / 13:00</td>
                            <td>Имя Фамилия</td>
                            <td>1000</td>
                            <td>100000</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script>
    $("select").niceSelect();
</script>
</body>
@endsection

