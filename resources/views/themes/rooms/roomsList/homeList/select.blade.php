<!-- ======================== Image blocks ======================== -->

<section class="image-blocks image-blocks-header">

    <div class="section-header" style="background-image:url(/mavikoy/assets/images/header-1.jpg)">
        <div class="container">
            <h2 class="title">Manzaraya Göre Odalar <a href="/odalar" class="btn btn-sm btn-clean">Tümünü
                    Gör</a></h2>
            <p>Manzara isteğinize göre odalara göz
                atabilirsiniz.</p>
        </div>
    </div>

    <div class="container">
    @foreach($viewRooms as $viewRoom)
    @if(in_array($viewRoom->category_id, [1, 2]))
        <!--item block -->
        <div class="blocks {{ $loop->iteration % 2 == 0 ? 'blocks-right' : 'blocks-left' }}">
            <div class="item">
                <div class="text">

                    <!-- === room info === -->

                    <h2 class="title">{{$viewRoom->title}}</h2>
                    <p>
                        {!!$viewRoom->content!!}
                    </p>

                    <!-- === room facilities === -->

                    <div class="room-facilities">

                    @foreach($viewRoom->roomAttributes as $attribute)
                            <figure>
                                <figcaption>
                                    
                                        <i class="{{ $attribute->image }}"></i>
                                   
                                    {{ $attribute->title }}
                                </figcaption>
                            </figure>
                        @endforeach

                    </div>

                    <!-- === booking === -->

                    <div class="book">
                        <div>
                            <a href="/havuz-manzarali-oda" class="btn btn-danger btn-lg">İncele</a>
                        </div>
                        <div>
                            <span class="price h2"></span>
                            <span></span>
                        </div>
                    </div> <!--/booking-->

                </div><!--/text-->
            </div> <!--/item-->

            @php
                $roomImage = DB::table('images')->where('room_id', $viewRoom->id)->first();
            @endphp

            @if($roomImage)
                <div class="image" style="background-image:url({{ $roomImage->image_path }})">
                    <img src="{{ $roomImage->image_path}}" alt="{{ $viewRoom->title }}" />
                </div>
            @endif
        </div>
        

        <!--item block -->
      

        @endif
   @endforeach
    </div> <!--/container-->
</section>
