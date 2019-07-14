@extends('header')
@section('content')
<body>
<!--
<div id="vk_api_transport"></div>
<script type="text/javascript">
    window.vkAsyncInit = function() {
        VK.init({apiId: 7051589});
    };

    setTimeout(function() {
        var el = document.createElement("script");
        el.type = "text/javascript";
        el.src = "https://vk.com/js/api/openapi.js?161";
        el.async = true;
        document.getElementById("vk_api_transport").appendChild(el);
    }, 0);
</script>
-->
<main>
    <div class="home">
        <div class="container">
            <div class="promo text-center">
                <h1>Умножь свои монеты</h1>
                <p class="mx-auto col-lg-7 my-3">
                    Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
                </p>
                <!--
                <a href="https://oauth.vk.com/authorize?client_id={{\config\Setting::Constants()['ID']}}&display=page&redirect_uri={{\config\Setting::Constants()['URL']}}&response_type=code" class="btn btn-light px-3"><i class="fa fa-vk"></i> Войти через VK</a>
          -->
            </div>
            <div class="row services">
                <div class="col-lg-3 text-center px-4 my-3">
                    <div class="service p-4">
                        <i class="fa fa-address-card"></i>
                        <span>Бонус при регистрации</span>
                    </div>
                </div>
                <div class="col-lg-3 text-center px-4 my-3">
                    <div class="service p-4">
                        <i class="fa fa-check"></i>
                        <span>Быстрые выплаты</span>
                    </div>
                </div>
                <div class="col-lg-3 text-center px-4 my-3">
                    <div class="service p-4">
                        <i class="fa fa-book"></i>
                        <span>Проверка любой игры на честность</span>
                    </div>
                </div>
                <div class="col-lg-3 text-center px-4 my-3">
                    <div class="service p-4">
                        <i class="fa fa-book"></i>
                        <span>Доп. зароботок с рефералов</span>
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
</body>
@endsection