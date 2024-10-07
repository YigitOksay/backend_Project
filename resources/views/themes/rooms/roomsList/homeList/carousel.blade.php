<!-- ========================  Rooms ======================== -->

<section class="rooms rooms-widget rooms-inner">

    <!-- === rooms content === -->

    <div class="container">
        <div class="main-room">
            <div id="room-category">
                <div class="section-header">
                    <div class="room-header">
                        <div class="container">
                            <h2 class="room-title">
                                <span>Odalar</span>
                                <a href="/odalar" id="room-button" class="btn btn-sm btn-clean-dark">Daha
                                    Fazla Keşfet</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-rooms owl-theme">

                <!-- === rooms item === -->
                @foreach ($rooms as $room)
                    <div class="item">
                        <article>
                            <div class="image">
                                <img src="{{ $room['image'] }}" alt="{{ $room['title'] }}" />
                            </div>
                            <div class="details">
                                <div class="text main-rooms-text">
                                    <h3 class="title"><a href="#">{{ $room['title'] }}</a></h3>
                                    {!! $room['content'] !!}
                                </div>
                                <div class="book">
                                    <a href="#" class="btn btn-main">{{ $room['meta_title'] }}</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div><!--/owl-rooms-->
        </div>
    </div> <!--/container-->

</section>
