<header>

    <!-- ======================== Navigation ======================== -->

    <div class="container">

        <!-- === navigation-top === -->

        <nav class="navigation-top clearfix">

            <!-- navigation-top-left -->

            <div class="navigation-top-left">
                <a class="box" target="_blank" href="https://www.facebook.com/mavikoybeachresort">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="box" target="_blank" href="https://www.instagram.com/avsa_mavikoy_resort/">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>

            <!-- navigation-top-right -->

            <div class="navigation-top-right">
                <a class="box" id="reservation-tag"
                    href="https://api.whatsapp.com/send?phone=+905411035340&text=Mavikoy%20Beach%20Resort%20Ho%C5%9Fgeldiniz%20L%C3%BCtfen%20Bu%20K%C4%B1sm%C4%B1%20Silmeden%20Mesaj%C4%B1n%C4%B1z%C4%B1%20Yaz%C4%B1n%C4%B1z:">
                    <i class="icon icon-tag"></i>
                    Rezervasyon
                </a>
                <a class="box" href="tel:+902668961100">
                    <i class="icon icon-phone-handset"></i>
                    +90 266 896 11 00
                </a>
                <a class="box" href="tel:+905411035340">
                    <i class="icon icon-phone-handset"></i>
                    +90 541 103 53 40
                </a>
            </div>
        </nav>

        <!-- === navigation-main === -->

        <nav class="navigation-main clearfix">

            <!-- logo -->

            <div class="logo animated fadeIn">
                <a href="/">
                    <img class="logo-desktop" src="/mavikoy/assets/images/mavikoybeachresort.png" alt="Alternate Text" />
                    <img class="logo-mobile" src="/mavikoy/assets/images/mavikoybeachresort.png" alt="Alternate Text" />
                </a>
            </div>

            <!-- toggle-menu -->

            <div class="toggle-menu"><i class="icon icon-menu"></i></div>

            <!-- navigation-block -->

            <div class="navigation-block clearfix">

                <!-- navigation-left -->

                <ul class="navigation-left">
                    <li>
                        <a href="/">Anasayfa</a>
                    </li>
                    <li>
                        <a href="sayfalar/hakkimizda">Hakkımızda</a>

                    </li>
                    <li>
                        <a href="/odalar">Odalar <span class="open-dropdown"><i
                                    class="fa fa-angle-down"></i></span></a>
                        <ul>
                            @if($roomsForHeader->count())
                            @foreach($roomsForHeader as $room)
                            <li><a href="{{ url('odalar/' . $room->url) }}">{{ $room->title }}</a></li>
                            @endforeach
                            @else
                            <p>Oda bulunamadı.</p>
                            @endif
                        </ul>
                    </li>

                </ul>

                <!-- navigation-right -->

                <ul class="navigation-right">
                    <li>
                        <a href="/aktiviteler">Aktiviteler</a>
                    </li>
                    <!-- <li>
                                <a href="#">Galeri</a>
                            </li> -->
                    <li>
                        <a href="/iletisim">İletişim</a>
                    </li>
                </ul>

            </div> <!--/navigation-block-->

        </nav>
    </div> <!--/container-->

</header>