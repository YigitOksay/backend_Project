@extends('themes.layout.index')
@section('content')
    <!-- ======================== Contact ======================== -->
    <div class="contact">

        <div class="container">

            <!-- === Google map === -->

            <div class="map" id="map">
                <iframe                    src="{{$contact->location}}"

                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="row">

                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

                    <!-- === Contact block === -->

                    <div class="contact-block">

                        <!-- === Contact banner === -->

                        <div class="banner">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10 text-center">
                                    <h2 class="title">E-posta Gönder</h2>
                                    <p>
                                        Ürünlerimizle ilgili sorularınız varsa lütfen bu formu kullanın <br />
                                        çok yakında sizlere geri döneceğiz.
                                    </p>

                                    <div class="contact-form-wrapper">

                                        <a class="btn btn-clean open-form" data-text-open="Form aracılığıyla bize ulaşın"
                                            data-text-close="Formu Kapat">Form aracılığıyla bize ulaşın</a>

                                        <div class="contact-form clearfix">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" value="" class="form-control"
                                                                placeholder="Ad Soyad" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" value="" class="form-control"
                                                                placeholder="E-posta Adresiniz" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <input type="text" value="" class="form-control"
                                                                placeholder="Konu" required="required">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" placeholder="Mesajınız" rows="10"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 text-center">
                                                        <input type="submit" class="btn btn-clean" value="Gönder" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- === Contact info === -->

                        <div class="contact-info">
                            <div class="row text-black">
                                <div class="col-sm-4">
                                    <figure class="text-center">
                                        <span class="icon icon-map-marker"></span>
                                        <figcaption>
                                            <strong class="fw-900">Neredeyiz?</strong>
                                            <span>{!!$contact->address!!}</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-4">
                                    <figure class="text-center">
                                        <span class="icon icon-phone"></span>
                                        <figcaption>
                                            <strong class="fw-900">Bizi Arayın</strong>
                                            <span>
                                                <strong>Bilgi ve Rezervasyon</strong> <a href="tel:+90{{$contact->phone}}"
                                                    class="text-black"> +90 {{$contact->phone}} </a><br />
                                                <strong>Otel İletişim</strong> <a href="tel:+90{{$contact->gsm}}"
                                                    class="text-black"> +90 {{$contact->gsm}}</a>
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-4">
                                    <figure class="text-center">
                                        <span class="icon icon-clock"></span>
                                        <figcaption>
                                            <strong class="fw-900">Çalışma Saatleri</strong>
                                            <span>
                                                <strong>Pzt - Cmt:</strong> 10.00 - 18.00 <br />
                                                <strong>Pzr:</strong> 12.00 - 14.00
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>

                    </div> <!--/contact-block-->
                </div><!--col-sm-8-->
            </div> <!--/row-->
        </div> <!--/container-->
    </div> <!--/contact-->
@endsection
