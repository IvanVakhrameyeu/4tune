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
                                        <a href="/games/double" class="btn">Double</a>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <a href="/games/jackpot" class="btn active">Jackpot</a>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <a href="/games/nvuti" class="btn">Nvuti</a>
                                    </div>
                                </div>
                            </div>

                            <div class="game-zone">
                            @yield('game')

                            <!--   сюда можно описние игр вставить         -->

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
    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel"
         aria-hidden="true">
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
    <div class="modal fade" id="outModal" tabindex="-1" role="dialog" aria-labelledby="outModalLabel"
         aria-hidden="true">
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
    <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalLabel"
         aria-hidden="true">
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
    <div class="modal fade" id="referalsModal" tabindex="-1" role="dialog" aria-labelledby="referalsModalLabel"
         aria-hidden="true">
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
    </body>
@endsection

