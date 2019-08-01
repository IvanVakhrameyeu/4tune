@extends('layouts.games')
@section('game')
    <div class="nvuti">
        <div class="row">
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Размер игры</span>
                    <input type="text" id="count_game" class="form-control nvuti-amount" value="1">
                    <div class="size-buttons">
                        <a onclick="change_input(this,'count_game')" type="double" class="btn">Удвоить</a>
                        <a onclick="change_input(this,'count_game')" type="half" class="btn ml-auto">1/2</a>
                        <a onclick="change_input(this,'count_game')" type="min" class="btn">Минимум</a>
                        <a onclick="change_input(this,'count_game')" type="max" class="btn ml-auto">Макс</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Шанс игры %</span>
                    <input type="text" id="chance_game" class="form-control nvuti-chance" value="95">
                    <div class="chance-buttons">
                        <a onclick="change_input(this,'chance_game')" type="double" class="btn nvuti-chance-double">Удвоить</a>
                        <a onclick="change_input(this,'chance_game')" type="half" class="btn ml-auto">1/2</a>
                        <a onclick="change_input(this,'chance_game')" type="min" class="btn">Минимум</a>
                        <a onclick="change_input(this,'chance_game')" type="max" class="btn ml-auto">Макс</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="game-side mx-auto">
                    <b class="nvuti-win">1.05 N</b>
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
                        {{$hash}}
                    </p>
                    <a href="#" class="whatis mx-auto">Что такое hash</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
@endsection
