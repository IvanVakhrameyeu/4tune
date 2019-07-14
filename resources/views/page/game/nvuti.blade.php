@extends('games')
@section('game')
    <script>
        function change_input($this, $name) {
            switch ($this.text) {
                case "Удвоить":
                    document.getElementById($name).value *= 2;
                    break;
                case "1/2":
                    document.getElementById($name).value /= 2;
                    break;
                case "Минимум":
                    document.getElementById($name).value = 1;
                    break;
                case "Макс":
                    ($name == "count_game") ? document.getElementById($name).value = 1000 : document.getElementById($name).value = 95;

                    break;
            }
            if($name == "count_game"){
                document.getElementById($name).value >1000? document.getElementById($name).value =1000:null;
            }
            else{
                document.getElementById($name).value >95? document.getElementById($name).value =95:null;
            }

            if (document.getElementById($name).value < 1 || isNaN(document.getElementById($name).value)) {
                document.getElementById($name).value = 1;
            }


        }


    </script>
    <div class="nvuti">
        <div class="row">
            <div class="col-lg-3">
                <div class="game-size-block mx-auto">
                    <span>Размер игры</span>
                    <input type="text" id="count_game" class="form-control" value="1">
                    <div class="size-buttons">
                        <a onclick="change_input(this,'count_game')" class="btn">Удвоить</a>
                        <a onclick="change_input(this,'count_game')" class="btn ml-auto">1/2</a>
                        <a onclick="change_input(this,'count_game')" class="btn">Минимум</a>
                        <a onclick="change_input(this,'count_game')" class="btn ml-auto">Макс</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="game-chance-block mx-auto">
                    <span>Шанс игры %</span>
                    <input type="text" id="chance_game" class="form-control" value="10">
                    <div class="chance-buttons">
                        <a onclick="change_input(this,'chance_game')" class="btn">Удвоить</a>
                        <a onclick="change_input(this,'chance_game')" class="btn ml-auto">1/2</a>
                        <a onclick="change_input(this,'chance_game')" class="btn">Минимум</a>
                        <a onclick="change_input(this,'chance_game')" class="btn ml-auto">Макс</a>
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
                                <a href="#" class="btn">Больше</a>
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
@endsection
