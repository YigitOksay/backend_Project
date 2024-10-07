<section class="frontpage-slider">
    <div class="owl-slider owl-slider-header">

        <!-- === slide item === -->
        @foreach ($sliders as $slider)
            <div class="item" style="background-image:url({{ $slider['image'] }})">
                <div class="box text-center">
                    <div class="container">
                        <h2 class="title animated h1" data-animation="fadeInDown">{{ $slider['name'] }}</h2>

                        <div class="desc animated" data-animation="fadeInUp">{!! $slider['description'] !!}</div>

                        <div class="animated" data-animation="fadeInUp">
                            <a href="{{ $slider['buttonLink'] }}" class="btn btn-clean">{{ $slider['buttonName'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div> <!--/owl-slider-->
</section>
