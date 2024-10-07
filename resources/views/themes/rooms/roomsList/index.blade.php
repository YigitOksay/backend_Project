@extends('themes.layout.index')
@section('content')
    <section class="page">

        <!-- ========================  Page header ======================== -->

        @include('themes.navigation.index')

        <!-- === rooms content === -->

        <div class="rooms rooms-category">
            <div class="container">

                <div class="row">

                    <!-- === rooms item === -->

                    @foreach($categories as $category)
    @if(in_array($category->id, [3, 4]))
        <div class="col-sm-6 col-md-6">
            <div class="item">
                <article>
                    <div class="image">
                        <img src="{{ $category->image }}" alt="{{ $category->title }}" />
                    </div>
                    <div class="details">
                        <div class="text">
                            <h2 class="title"><a href="{{ route('showRoom', ['url' => $category->url]) }}">{{ $category->title }}</a></h2>
                            <p>{{ $category->title }}</p>
                        </div>
                        <div class="book">
                            <div>
                                <a href="{{ route('showRoom', ['url' => $category->url]) }}" class="btn btn-main">Şimdi İncele</a>
                            </div>
                            <div>
                                <span class="price h2"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    @endif
@endforeach


<!-- === rooms item === -->

@foreach($categories as $category)
    @if(!in_array($category->id, [3, 4]))
        <div class="col-sm-6 col-md-4">
            <div class="item">
                <article>
                    <div class="image">
                        <img src="{{ $category->image }}" alt="{{ $category->title }}" />
                    </div>
                    <div class="details">
                        <div class="text">
                            <h2 class="title"><a href="{{ $category->url }}">{{ $category->title }}</a></h2>
                            <p>{{ $category->title }}</p>
                        </div>
                        <div class="book">
                            <div>
                                <a href="{{ $category->url }}" class="btn btn-main">Şimdi İncele</a>
                            </div>
                            <div>
                                <span class="price h2"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    @endif
@endforeach

            

                </div>

            </div> <!--/container-->
        </div>
    </section>
    
@endsection
