@extends('header')
@section('content')
    <main class="container-l2">
        <h2>Вход</h2>

        <section class="grid-6">
            <form action="{{route('login.action')}}" method="POST">
                {!! csrf_field() !!}
                <div class="form-item">
                    <input type="text" name="login" placeholder="Логин"/>
                </div>

                <div class="form-item">
                    <input type="password" name="password" placeholder="Пароль"/>
                </div>
                <div class="form-item">
                    <label>
                        <input type="checkbox" name="remember" class="button"/>

                        Запомнить меня
                    </label>
                </div>
                <input type="submit" value="Вход" class="button"/>
            </form>

            <a href="{{route('registration')}}">Нет аккаунта?</a>
            <a href="#">Восстановление пароля</a>
        </section>

    </main>
@endsection
