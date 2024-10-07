<!-- ========================  Cards ======================== -->

<section class="cards">

    <!-- === cards header === -->

    <div class="section-header">
        <div class="container">
            <h2 class="title">Nerelere Yakın&quest; <a href="/blog" class="btn btn-sm btn-clean-dark">Tümünü
                    Gör</a></h2>
            <p>Çevresinde gezilecek yerlere göz atın.</p>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- === item === -->

            @foreach ($blogCategories as $blog)
                @if ($blog['home_page'] == 1)
                    @if ($blog['orderNo'] == 1)
                        <div class="col-xs-12 col-md-8">
                            <figure>
                                <figcaption style="background-image:url({{ $blog['image'] }})">
                                    <img src="{{ $blog['image'] }}" alt />
                                </figcaption>
                                <a href="{{ $blog['url'] }}" class="btn btn-clean">{{ $blog['title'] }}</a>
                            </figure>
                        </div>
                    @else
                        <div class="col-xs-6 col-md-4">
                            <figure>
                                <figcaption style="background-image:url({{ $blog['image'] }})">
                                    <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" />
                                </figcaption>
                                <a href="{{ $blog['url'] }}" class="btn btn-clean">{{ $blog['title'] }}</a>
                            </figure>
                        </div>
                    @endif
                @endif
            @endforeach

        </div> <!--/row-->

    </div> <!--/container-->
</section>
