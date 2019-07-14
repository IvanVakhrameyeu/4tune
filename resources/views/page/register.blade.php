@extends('header')
@section('content')
    <main class="registration container-l2">
        <h2>Регистрация</h2>

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
                    <input type="password" name="password_repeat" placeholder="Повторите пароль"/>
                </div>


                <div class="form-item">
                    <label>

                        <a href="{{route('login')}}">У меня уже есть аккаунт</a>
                    </label>
                </div>
                <input type="submit" value="Создать пользователя" class="button"/>
            </form>

        </section>

    </main>
@endsection
