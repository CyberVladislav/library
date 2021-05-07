@extends('welcome')
@section('content')

<section id="page-title" style="background-image:url(https://images.pexels.com/photos/1416530/pexels-photo-1416530.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
    <div class="container">
        <div class="page-title">
            <h1 class="text-white">Контакты</h1>
            <span class="text-white">Появились какие-нибудь вопросы? Свяжитесь с нами и мы обязательно ответим на них.</span>
        </div>
        <div class="breadcrumb text-white">
            <ul>
                <li><a href="{{ asset('/') }}">Главная</a> </li>
                <li class="active"><a href="#">Контакты</a></li>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-uppercase">Свяжитесь с нами</h3>
                <p>Наша библиотека активно генерирует собственные, приобретает электронные информационные ресурсы крупнейших мировых производителей и предоставляет свободный доступ к национальным и мировым информационным ресурсам.</p>
                <p>Оснащенная современным инженерным и технологическим оборудованием, библиотека использует новейшие информационные технологии, на качественно новом уровне удовлетворяет образовательные, научные, культурные запросы общества, формирует документальную память нации.</p>
                <div class="row m-t-40">
                    <div class="col-lg-6">
                        <address>
                            <strong>Основной офис</strong><br>
                            220234, Россия, г. Москва<br>
                            Ул. Пушкина, д. 6, корп. 1<br>
                            <abbr title="Phone">Т:</h4> 8(029) 556-08-45
                        </address>
                    </div>
                    <div class="col-lg-6">
                        <address>
                            <strong>Филиал</strong><br>
                            212042, Республика Беларусь, г. Минск<br>
                            Проспект Мурина, д. 86, корп. 3, оф. 544<br>
                            <abbr title="Phone">Т:</h4> 8(033) 582-94-52
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--<section class="no-padding">--}}
{{--    <!-- Google Map -->--}}
{{--    <div class="map" data-latitude="-37.817240" data-longitude="144.955826" data-style="light" data-info="Hello from &lt;br&gt; Inspiro Themes" data-height-lg="500" data-height-xs="200" data-height-sm="300"></div>--}}
{{--    <!-- end: Google Map -->--}}
{{--</section>--}}

@endsection
