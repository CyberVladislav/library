@extends('welcome')
@section('content')
    @isset($sliders)
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360">
            <!-- Slide 1 -->
            @foreach($sliders as $slider)
                <div class="slide kenburns" style="background-image:url({{ Voyager::image( $slider->image ) }});">
                    <div class="bg-overlay"></div>
                    <div class="container">
                        <div class="slide-captions text-center text-light">
                            <span class="strong">{!! $slider->title !!}</span>
                            <h2 class="text-dark">{!! $slider->body !!}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset

    @isset($services)
        <section>
            <div class="container">
                <div class="heading-text heading-section text-center">
                    <h2>Услуги, которые мы предлагаем</h2>
                    <p>Выберите услугу, подходящую под решение ваших задач.</p>
                </div>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4">
                            <div class="icon-box effect medium border center">
                                <h3>{{ $service->title }}</h3>
                                <p>{{ $service->body}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset

    <div class="call-to-action background-image p-t-100 p-b-100" style="background-image:url({{asset('images/parallax.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="text-light">Join by April 27 and <span>Win $200</span> in Programs and Services</h3>
                    <p class="text-light">This is a simple hero unit, a simple call-to-action-style component for calling extra attention to featured content.</p>
                </div>
                <div class="col-lg-2"> <a class="btn btn-light btn-outline">Call us now!</a> </div>
            </div>
        </div>
    </div>

    @isset($articles)
        <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div id="blog" class="post-thumbnails">
                            @foreach($articles as $article)
                                <div class="post-item">
                                    <div class="post-item-wrap">
                                        <div class="post-image">
                                            <a href="{{asset('blog/'.$article->slug)}}">
                                                <img alt="" src="{{ Voyager::image( $article->image ) }}">
                                            </a>
                                        </div>
                                        <div class="post-item-description">
                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $article->created_at }}</span>
                                            <h2><a href="{{asset('blog/'.$article->slug)}}">{{ $article->title }}</a></h2>
                                            <p>{{ $article->excerpt }}</p>
                                            <a href="{{asset('blog/'.$article->slug)}}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

    <footer id="footer">
        <div class="copyright-content">
            <div class="container">
                <div class="copyright-text text-center">&copy; 2019 POLO - Responsive Multi-Purpose HTML5 Template. All Rights Reserved.<a href="//www.inspiro-media.com" target="_blank" rel="noopener"> INSPIRO</a> </div>
            </div>
        </div>
    </footer>
@endsection
