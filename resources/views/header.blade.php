<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
          integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/style.css')}}">
</head>
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand logo" href="/"></a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item mx-4 active">
                        <a class="nav-link" href="/games">Играть</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link" href="#"><i class="fa fa-comment"></i></a>
                    </li>
                    <li class="nav-item profile">
                        <ul class="navbar-nav ml-auto">
                        @if(isset($_COOKIE['user_name']))
                            <!-- отображение пользователя -->
                                <a class="nav-link" href="/profile">
                                    <li class="nav-item ml-4 profile">
                                        <a class="nav-link" href="#">
                                            <img src="{{\App\User::getPhoto($_COOKIE['user_name'])}}">
                                        </a>
                                    </li>
                                    <li>
                                        <b>{{\App\User::getName($_COOKIE['user_name'])}}</b>
                                        <span class="caret">{{\App\Wallet::getMoney(1)}}</span>
                                    </li>
                                    <!-- Выход из авторизации -->
                                    <li class="nav-item ml-3">
                                        <a class="nav-link" href="#">
                                            <a class="dropdown-item" href="/logout">Выход
                                            </a>
                                        </a>
                                    </li>
                                </a>
                            @else
                            <!--    <li class="nav-item mx-4">
                                    @include('auth.social')
                                    @yield('js')
                                </li>-->
                            @endif
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
@yield('content')

<footer class="py-3">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                <p>Права защищены, <b>копирование запрещено</b></p>
                <p>www.site.ru &copy; 2018 / design by <b>fleetch</b></p>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>


<!--
<script src="https://vk.com/js/api/openapi.js?161" type="text/javascript"></script>
<script type="text/javascript">
    VK.init({
        apiId: ВАШ_API_ID
    });
</script>
-->

