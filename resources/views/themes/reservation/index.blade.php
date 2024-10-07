<!-- ======================== Booking Start ======================== -->

<section class="booking booking-default-theme">
    <div class="booking-wrapper">

        <div class="container">
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
                            <input class="qty-result" type="text" value="2" id="qty-result"
                                readonly="readonly" />
                            <div class="qty-result-text date-value" id="qty-result-text"></div>
                        </div>
                        <!--=== guests list ===-->
                        <ul class="guest-list">

                            <li class="header">
                                Lütfen misafir sayısını
                                seçin <span class="qty-apply"><i class="icon icon-cross"></i></span>
                            </li>

                            <!--=== adults ===-->

                            <li class="clearfix">

                                <!--=== Adults value ===-->

                                <div>
                                    <input class="qty-amount" value="2" type="text" id="ticket-adult"
                                        data-value="2" readonly="readonly" />
                                </div>

                                <div>
                                    <span>Yetişkin <small>18
                                            yaş ve
                                            üzeri</small></span>
                                </div>

                                <!--=== Add/remove quantity buttons ===-->

                                <div>
                                    <input class="qty-btn qty-minus" value="-" type="button"
                                        data-field="ticket-adult" />
                                    <input class="qty-btn qty-plus" value="+" type="button"
                                        data-field="ticket-adult" />
                                </div>

                            </li>

                            <!--=== chilrens ===-->

                            <li class="clearfix">

                                <!--=== Adults value ===-->

                                <div>
                                    <input class="qty-amount" value="0" type="text" id="ticket-children"
                                        data-value="0" readonly="readonly" />
                                </div>

                                <!--=== Label ===-->

                                <div>
                                    <span>Çocuk <small>2-18
                                            yaş
                                            arası</small></span>
                                </div>

                                <!--=== Add/remove quantity buttons ===-->

                                <div>
                                    <input class="qty-btn qty-minus" value="-" type="button"
                                        data-field="ticket-children" />
                                    <input class="qty-btn qty-plus" value="+" type="button"
                                        data-field="ticket-children" />
                                </div>

                            </li>

                            <!--=== Infants ===-->

                            <li class="clearfix">

                                <!--=== Adults value ===-->

                                <div>
                                    <input class="qty-amount" value="0" type="text" id="ticket-infants"
                                        data-value="0" readonly="readonly" />
                                </div>

                                <!--=== Label ===-->

                                <div>
                                    <span>Bebek <small> 2
                                            yaş
                                            altı</small></span>
                                </div>

                                <!--=== Add/remove quantity buttons ===-->

                                <div>
                                    <input class="qty-btn qty-minus" value="-" type="button"
                                        data-field="ticket-infants" />
                                    <input class="qty-btn qty-plus" value="+" type="button"
                                        data-field="ticket-infants" />
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!--=== button ===-->

                <div class="col-xs-12 col-sm-4">
                    <a href="https://api.whatsapp.com/send?phone=+905411035340&text=Mavikoy%20Beach%20Resort%20Ho%C5%9Fgeldiniz%20L%C3%BCtfen%20Bu%20K%C4%B1sm%C4%B1%20Silmeden%20Mesaj%C4%B1n%C4%B1z%C4%B1%20Yaz%C4%B1n%C4%B1z:"
                        class="btn btn-clean">
                        Rezervasyon
                        <small>En İyi Fiyat
                            Garantisi</small>
                    </a>
                </div>

            </div> <!--/row-->
        </div><!--/booking-wrapper-->
    </div> <!--/container-->
</section>
<!-- ======================== Booking End ======================== -->