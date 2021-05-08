@extends('welcome')
@section('content')
        <!-- Page title -->
        <section id="page-title" class="page-title-center text-light" style="background-image:url(https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1>Книжная находка</h1>
                </div>
                <div class="align-center h5">
                Вы наконец заглянули к нам в поисках доброй пары-тройки книг? Мы бесконечно рады, ведь именно затем, дорогой читатель, мы собрали огромную библиотеку. Наша цель – угодить вам предложением и сделать это так, чтобы впредь у вас не возникало сомнений, какую книгу прочесть.
                </div>
            </div>
        </section>
        <!-- end: Page title -->        
        <!-- Content -->
        <section id="page-content">
            <div class="container mb-4">
                <div class="row flex-row-reverse">
                    <!-- Portfolio -->
                    <div class="content col-lg-9" id="books">
                        @if(count($books) > 0)
                            <!-- Books -->
                            @foreach ($books as $book)
                                <div class="book-item border-bottom d-flex flex-column flex-md-row mt-3">
                                    <div class="item-photo mr-md-5 text-center pb-4">
                                        <img alt="" src="{{ Voyager::image( $book->image ) }}">
                                    </div>
                                    <div class="item-desc">
                                        <ul class="list-unstyled">
                                            <li class="d-flex d-md-block justify-content-center text-right">
                                                @if(Auth::check())
                                                    @if(isset($arrayId) && in_array($book->id, $arrayId))
                                                        <button type="button" class="btn btn-light disabled">Забронирована</button>
                                                    @else
                                                        <button type="button" class="js-adding-modal btn btn-light" bookId="{{ $book->id }}" data-toggle="modal" data-target="#addModal">Забронировать</button>
                                                    @endif
                                                @else
                                                    <button type="button" class="js-adding-modal btn btn-light" bookId="{{ $book->id }}" data-toggle="modal" data-target="#addModal">Забронировать</button>
                                                @endif
                                            </li>
                                            @if(isset($book->categories->name))
                                                <li><strong>Жанр: </strong>{{ $book->categories->name }}</li>
                                            @endif
                                            @isset($book->series)
                                                <li><strong>Серия: </strong>{{ $book->series }}</li>
                                            @endisset
                                            @isset($book->author)
                                                <li><strong>Автор: </strong>{{ $book->author }}</li>
                                            @endisset
                                            @isset($book->name)
                                                <li><strong>Название: </strong>{{ $book->name }}</li>
                                            @endisset
                                            @isset($book->publisher)
                                                <li><strong>Издательство: </strong>{{ $book->publisher }}</li>
                                            @endisset
                                            @isset($book->isbn)
                                                <li><strong>ISBN: </strong>{{ $book->isbn }}</li>
                                            @endisset
                                            @isset($book->year)
                                                <li><strong>Год: </strong>{{ $book->year }}</li>
                                            @endisset
                                            @isset($book->page)
                                                <li><strong>Страниц: </strong>{{ $book->page }}</li>
                                            @endisset
                                            @isset($book->language)
                                                <li><strong>Язык: </strong>{{ $book->language }}</li>
                                            @endisset
                                        </ul>
                                        <p>{{ $book->excerpt}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="h3 text-center">
                                Ничего не найдено по вашему запросу
                            </div>
                        @endif
                    </div>
                    <!-- end: Portfolio -->
                
                    <div class="sidebar col-lg-3">
                        <!--widget newsletter-->
                        <div class="widget  widget-newsletter">
                            <form id="widget-search-form-sidebar" action="/search" method="get">
                                <div class="input-group">
                                    <input type="text" aria-required="true" name="query" class="form-control widget-search-form" placeholder="Поиск по названию">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end: widget newsletter-->
                        <div id="widget-sort-form-sidebar" class="widget widget-newsletter">
                            <h4 class="widget-title">Сортировка</h4>
                            <form action="/sort" method="get">
                                <div class="sorting">
                                    <select class="form-control" name="sorting" onchange="this.form.submit();">
                                        @switch($sortArr)
                                            @case('name,asc')
                                                <option value="id,asc">По умолчанию</option>
                                                <option value="name,asc" selected>По названию: А-Я</option>
                                                <option value="name,desc">По названию: Я-А</option>
                                                <option value="author,asc">По автору: А-Я</option>
                                                <option value="author,desc">По автору: Я-А</option>
                                                @break
                                            @case('name,desc')
                                                <option value="id,asc">По умолчанию</option>
                                                <option value="name,asc">По названию: А-Я</option>
                                                <option value="name,desc" selected>По названию: Я-А</option>
                                                <option value="author,asc">По автору: А-Я</option>
                                                <option value="author,desc">По автору: Я-А</option>
                                                @break
                                            @case('author,asc')
                                                <option value="id,asc">По умолчанию</option>
                                                <option value="name,asc">По названию: А-Я</option>
                                                <option value="name,desc">По названию: Я-А</option>
                                                <option value="author,asc" selected>По автору: А-Я</option>
                                                <option value="author,desc">По автору: Я-А</option>
                                                @break
                                            @case('author,desc')
                                                <option value="id,asc">По умолчанию</option>
                                                <option value="name,asc">По названию: А-Я</option>
                                                <option value="name,desc">По названию: Я-А</option>
                                                <option value="author,asc">По автору: А-Я</option>
                                                <option value="author,desc" selected>По автору: Я-А</option>
                                                @break
                                            @default                                        
                                                <option value="id,asc">По умолчанию</option>
                                                <option value="name,asc">По названию: А-Я</option>
                                                <option value="name,desc">По названию: Я-А</option>
                                                <option value="author,asc">По автору: А-Я</option>
                                                <option value="author,desc">По автору: Я-А</option>
                                        @endswitch
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- widget -->
                        <div class="widget">
                            <h4 class="widget-title">Категории</h4>
                            <ul class="list-unstyled">
                            @foreach($categories as $category)
                                <li><a id="js-category-{{$category->id}}" href="{{ asset('library/'.$category->id) }}">{{ $category->name }}</a></li>
						    @endforeach
                            </ul>   
                        </div>
                        <!-- end: widget-->
                    </div>
            </div>
        {!! $books->links() !!}
        </section> <!-- end: Content -->
        
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center p-0" id="registerModalLabel">Забронировать книгу</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="adding-book-form" id="addForm" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="align-items-center d-flex flex-column">
                                <input class="js-hide-book-id" type="hidden" value="">

                                <div class="form-group">
                                    <label for="surname" class="text-center">Укажите фамилию:</label>
                                    <input type="text" id="surname" name="surname" placeholder="Фамилия">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="text-center">Укажите номер телефона:</label>
                                    <input type="text" id="phone" name="phone" placeholder="Номер телефона:">
                                </div>
                                <div class="form-group">
                                    <label for="date" class="text-center">Укажите дату:</label>
                                    <input type="date" id="date" name="date" min="{{Carbon\Carbon::now()->toDateString() }}" max="2021-12-31">
                                </div>
                                <div class="form-group mt-4 align-items-center d-flex flex-column">
                                    @if(Auth::check())
                                        <a href="##" class="btn btn-primary js-add-book">Забронировать</a>
                                        <div class="auth-error text-center text-success text-danger"></div>
                                    @else
                                        <a href="##" class="btn btn-primary disabled js-add-book">Забронировать</a>
                                        <div class="auth-error text-danger">
                                            Для бронирования книги нужно быть авторизованным
                                        </div>
                                    @endif
                                </div>
                            </div>									
						</form>
                    </div>
                </div>
            </div>
        </div>
@endsection
