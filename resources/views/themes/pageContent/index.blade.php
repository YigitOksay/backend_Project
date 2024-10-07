@extends('themes.layout.index')
@section('content')
<section class="page">
    @include('themes.navigation.index')
    <div class="image-blocks image-blocks-category">
        <div class="container">
            <div class="about">
                <!--text-block-->

                <div class="text-block">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="text">
                                @if($pages) 
                                {!! $pages->content !!}
                                @else
                                <p>Page not found.</p>
                                @endif
                            </div>
                            @include('themes.certificate.index')
                        </div>
                        <!--/col-->
                    </div>
                    <!--/row-->
                </div>
                <!--/container-->
            </div>
        </div>
        @include('themes.hotelInfo.index')
</section>
@endsection