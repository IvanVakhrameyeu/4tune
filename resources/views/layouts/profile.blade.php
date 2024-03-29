@extends('layouts.app');
@section('content')
    <main>
        <div class="profile-page">
            <div class="container px-5">
                <div class="profile">
                    <div class="row">
                        <div class="col-lg-4 ml-lg-4">
                            <div class="avatar mr-auto ml-lg-none ml-auto my-4">
                                <a href="#" class="change-btn">Сменить аватар</a>
                                <img src="images/test-big-avatar.png" alt="">
                                <a href="#" class="btn btn-light">Баланс: 150 р</a>
                                <a href="#" class="btn btn-primary">Пополнить счет</a>
                                <a href="#" class="btn btn-primary">Вывод средств</a>
                            </div>
                        </div>
                        <div class="col-lg-6 px-5 mr-auto pt-3">
                            <h5>Статистика аккаунта <b>Name</b></h5>
                            <div class="table-responsive">
                                <table class="mt-4">
                                    <tr>
                                        <td>Ваш ID:</td>
                                        <td>010202</td>
                                    </tr>
                                    <tr class="empty">
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>Сумма пополнений:</td>
                                        <td>500 р</td>
                                    </tr>
                                    <tr>
                                        <td>Сумма выводов:</td>
                                        <td>1 500 р</td>
                                    </tr>
                                    <tr class="empty">
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>Рефералы:</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Доходы с рефералов:</td>
                                        <td>100 р</td>
                                    </tr>
                                    <tr class="empty">
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td>Статус аккаунта:</td>
                                        <td class="status active">Активный</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row modes">
                    <h2 class="mx-auto col-lg-12 text-center">Игровые режимы</h2>

                    <div class="row col-lg-12 text-center mx-auto">
                        <div class="col-lg-4 px-lg-5 px-4 my-3 text-center">
                            <div class="mode">
                                <h4>JackPot</h4>
                                <span>В банке</span>
                                <b>3 000 <i class="fa fa-rub"></i></b>
                            </div>
                        </div>
                        <div class="col-lg-4 px-lg-5 px-4 my-3 text-center">
                            <div class="mode">
                                <h4>Dobule</h4>
                                <span>В банке</span>
                                <b>3 000 <i class="fa fa-rub"></i></b>
                            </div>
                        </div>
                        <div class="col-lg-4 px-lg-5 px-4 my-3 text-center">
                            <div class="mode">
                                <h4>Nvuti</h4>
                                <span>В банке</span>
                                <b>3 000 <i class="fa fa-rub"></i></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

