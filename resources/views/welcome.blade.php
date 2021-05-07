<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="body-inner">
    <header id="header" data-fullwidth="true">
        <div class="header-inner">
            <div class="container">
                <!--Logo-->
                <div id="logo">
                    <a href="{{ asset('/') }}">
                        <span class="logo-default">POLO</span>
                        <span class="logo-dark">POLO</span>
                    </a>
                </div>
                <div id="mainMenu">
                    <div class="container">
                        <nav>
                            <ul>
                                <li><a href="{{ asset('contacts') }}">Контакты</a></li>
                                <li><a href="{{ asset('services') }}">Сервисы</a></li>
                                <li><a href="{{ asset('blog') }}">Блог</a></li>
                                @if (Auth::check())
                                    <li class="dropdown"><a href="#">{{Auth::user()->name}}</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                    {{ __('Выход') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ asset('login') }}">Вход</a></li>
                                    <li><a href="{{ asset('register') }}">Регистрация</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>
</body>
</html>
