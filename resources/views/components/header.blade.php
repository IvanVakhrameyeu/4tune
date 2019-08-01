<header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            @guest
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="/login/vkontakte">Вход</a>
                                </li>
                            @else
                                <a class="nav-link" href="/profile">
                                    <li class="nav-item ml-4 profile">
                                        <a class="nav-link" href="#">
                                            <img src="{{Auth::user()->avatar}}">
                                        </a>
                                    </li>
                                    <li>
                                        <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>
                                        <a class="wallet-balance">{{Auth::user()->balanceFloat}}</a>
                                    </li>
                                    <!-- Выход из авторизации -->
                                    <li class="nav-item ml-3">
                                        <a class="nav-link" href="#">
                                            <a class="dropdown-item" href="/logout">Выход
                                            </a>
                                        </a>
                                    </li>
                                </a>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
