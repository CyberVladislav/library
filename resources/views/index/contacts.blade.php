@extends('welcome')
@section('content')

<section id="page-title">
    <div class="container">
        <div class="page-title">
            <h1>Контакты</h1>
            <span>Хотите получить подбор тура уже сегодня? Сообщите нам.</span>
        </div>
        <div class="breadcrumb">
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
                <p>Работаем честно и только так! Каждую поездку оформляем официально, никогда не отказываемся от своих обязательств. Мы всегда готовы оказать помощь нашим клиентам, как до начала путешествия так и во время его. Без проблем можем рассказать, как формируются цены на туры — мы ничего не скрываем от своих клиентов. .</p>
                <p>Поможем выбрать отдых, который будет полностью отвечать Вашим пожеланиям. Мы не просто подберем оптимальный вариант, но и сделаем все, чтобы Ваше путешествие прошло именно так, как было задумано. Предоставляем только достоверную информацию о гостиницах, сервисе, курортах и перелёте</p>
                <div class="row m-t-40">
                    <div class="col-lg-6">
                        <address>
                            <strong>Компания Polo</strong><br>
                            220234, Россия, г. Москва<br>
                            Ул. Пушкина, д. 6, корп. 1<br>
                            <abbr title="Phone">Т:</h4> 8(029) 556-08-45
                        </address>
                    </div>
                    <div class="col-lg-6">
                        <address>
                            <strong>Офис Polo</strong><br>
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
