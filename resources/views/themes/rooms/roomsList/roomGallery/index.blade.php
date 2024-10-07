<!-- === Room gallery === -->

<div class="room">
    <div class="room-gallery">
        <div class="container">
            <div class="owl-slider owl-theme owl-slider-gallery">
            @foreach($roomsDetails as $roomDetail)
                @foreach($roomDetail->images as $image)
                <div class="item">
                    <img src="{{$image->image_path}}" alt="{{$image->image_path}}" />
                </div>
                @endforeach
            @endforeach
            </div> <!--/owl-slider-->
        </div>
    </div> <!--/room-gallery-->

    <!-- === Booking === -->
    <div class="booking booking-inner">
        <div class="container">
            <div class="booking-wrapper">
                <div class="row">
                    <!--=== date arrival ===-->
                    <div class="col-xs-4 col-sm-3">
                        <div class="date" id="dateArrival" data-text="Giriş">
                            <input class="datepicker" readonly="readonly" />
                            <div class="date-value"></div>
                        </div>
                    </div>

                    <!--=== date departure ===-->
                    <div class="col-xs-4 col-sm-3">
                        <div class="date" id="dateDeparture" data-text="Çıkış">
                            <input class="datepicker" readonly="readonly" />
                            <div class="date-value"></div>
                        </div>
                    </div>

                    <!--=== guests ===-->
                    <div class="col-xs-4 col-sm-2">
                        <div class="guests" data-text="Misafir">
                            <div class="result">
                                <input class="qty-result" type="text" value="2" id="qty-result" readonly="readonly" />
                                <div class="qty-result-text date-value" id="qty-result-text"></div>
                            </div>
                            <!--=== guests list ===-->
                            <ul class="guest-list">
                                <!-- === adults === -->
                                <li class="clearfix">
                                    <div>
                                        <input class="qty-amount" value="2" type="text" id="ticket-adult" data-value="2" readonly="readonly" />
                                    </div>
                                    <div>
                                        <span>Yetişkin <small>18 yaş ve üzeri</small></span>
                                    </div>
                                    <div>
                                        <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-adult" />
                                        <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-adult" />
                                    </div>
                                </li>

                                <!-- === children === -->
                                <li class="clearfix">
                                    <div>
                                        <input class="qty-amount" value="0" type="text" id="ticket-children" data-value="0" readonly="readonly" />
                                    </div>
                                    <div>
                                        <span>Çocuk <small>2-18 yaş arası</small></span>
                                    </div>
                                    <div>
                                        <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-children" />
                                        <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-children" />
                                    </div>
                                </li>

                                <!-- === infants === -->
                                <li class="clearfix">
                                    <div>
                                        <input class="qty-amount" value="0" type="text" id="ticket-infants" data-value="0" readonly="readonly" />
                                    </div>
                                    <div>
                                        <span>Bebek <small>2 yaş altı</small></span>
                                    </div>
                                    <div>
                                        <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-infants" />
                                        <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-infants" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--=== button ===-->
                    <div class="col-xs-12 col-sm-4">
                        <a href="https://api.whatsapp.com/send?phone=+905411035340&text=Mavikoy%20Beach%20Resort%20Ho%C5%9Fgeldiniz%20L%C3%BCtfen%20Bu%20K%C4%B1sm%C4%B1%20Silmeden%20Mesaj%C4%B1n%C4%B1z%C4%B1%20Yaz%C4%B1n%C4%B1z:" class="btn btn-clean">
                            Rezervasyon
                            <small>En iyi fiyat garantisi</small>
                        </a>
                    </div>
                </div> <!--/row-->
            </div><!--/booking-wrapper-->
        </div> <!--/container-->
    </div> <!--/booking-->

    <!-- === Room overview === -->
    @foreach($roomsDetails as $roomDetail)
    <div class="room-overview">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <!-- === Room aminities === -->
                    <div class="room-block room-aminities">
                        <h2 class="title">Oda olanakları</h2>
                        <div class="row">
                            <!-- === item === -->
                            @foreach($roomDetail->roomAttributes as $attribute)
                            <div class="col-xs-6 col-sm-2">
                                <figure>
                                    <figcaption>
                                        <span class="hotelicon {{ $attribute->image }}"></span>
                                        <p>{{ $attribute->title }}</p>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- === Room block === -->
                    <div class="room-block">
                        <h2 class="title">Odaya genel bakış</h2>
                        <p>{!! $roomDetail->content !!}</p>
                    </div>

                    <!-- === Room block === -->
                    <div class="room-block">
                        <h2 class="title">Kurallarımız</h2>
                        <!-- Kurallar burada -->

                        <!-- === box === -->

                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Odaya Giriş Saati</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <p>{!!$roomDetail->entrance!!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- === box === -->

                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Çıkış Saati</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <p>{!!$roomDetail->exit!!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- === box === -->

                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>İptal / Ön ödeme</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <p>
                                        {!!$roomDetail->cancellation!!}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- === box === -->

                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Çocuklar ve Ekstra yataklar</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <p>{!!$roomDetail->extra!!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- === box === -->

                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Evcil hayvanlar</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <p>{!!$roomDetail->pets!!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- === box === -->

                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>İlave bilgi</strong></p>
                                </div>
                                <div class="col-md-8">
                                    <p>{!!$roomDetail->information!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!--/col-sm-10-->
        </div> <!--/row-->
    </div> <!--/container-->
    @endforeach
</div> <!--/room-overview-->
</div>
