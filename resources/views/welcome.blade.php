<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="images/favicon.png">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Document title -->
    <title>Книжная находка</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        @if (Request::path() == 'login' || Request::path() == 'register')
            <header id="header" data-transparent="true" class="header-disable-fixed">
        @else
            <header id="header" data-transparent="true" class="dark header-disable-fixed">
        @endif
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{ asset('/') }}">
                            <span class="logo-default">Книжник</span>
                            <span class="logo-dark">Книжник</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    @if (Auth::check())
                                    <li><a href="{{ asset('contacts') }}">Контакты</a></li>
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
                                    <li><a href="{{ asset('contacts') }}">Контакты</a></li>
                                    <li><a href="{{ asset('login') }}">Вход</a></li>
                                    <li><a href="{{ asset('register') }}">Регистрация</a></li>
                                @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- end: Header -->

    @yield('content')
 <!-- Footer -->
        <footer id="footer">
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2021 library - сайт библиотеки, в которой можно забронировать книгу бесплатно. Все материалы взяты из открытых источников и представлены исключительно в ознакомительных целях. Все права на книги принадлежат их авторам и издательствам.</div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        var url = window.location.pathname;
        var substringArray = url.split("/");
        if (typeof(substringArray[2]) != "undefined" && substringArray[2] !== null){
            $('#js-category-'+substringArray[2]).addClass('active');
        }
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(function() {
            $('input[name=phone]').mask('+375(00)000-00-00');
        });
    </script>  
    <!-- /jQuery Mask Plugin -->
</body>
