@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Genel Ayarlar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Genel Ayarlar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <form name="cmsForm" id="cmsForm" action="{{ url('NPanel/settings/update') }}" method="post">
                                @csrf
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Site Yönetimi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">İletişim
                                                Bilgileri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-four-messages" role="tab"
                                                aria-controls="custom-tabs-four-messages" aria-selected="false">SEO
                                                Ayarları</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-code-tab" data-toggle="pill"
                                                href="#custom-tabs-four-code" role="tab"
                                                aria-controls="custom-tabs-four-code" aria-selected="false">İzleme
                                                Kodları</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <!-- Site Yönetimi -->
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-home-tab">

                                            <!-- SELECT2 EXAMPLE -->
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Slider Bilgileri</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a id="logo_btn" data-input="logo_input"
                                                                            data-preview="holder" class="btn btn-primary">
                                                                            <i class="fa fa-picture-o"></i> Site Logosu
                                                                        </a>
                                                                    </span>
                                                                    <input id="logo_input" class="form-control"
                                                                        type="text" name="logo"
                                                                        @if (!empty($settings['logo'])) value="{{ $settings['logo'] }}" @endif />
                                                                </div>
                                                                <div class="imageContent">
                                                                    @if (isset($settings['logo']) && !empty($settings['logo']))
                                                                        <img id="holder"
                                                                            style="margin-top:15px; max-height:100px;"
                                                                            src="{{ asset($settings['logo']) }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a id="mobil_btn" data-input="mobileLogo_input"
                                                                            data-preview="mobil_holder"
                                                                            class="btn btn-primary">
                                                                            <i class="fa fa-picture-o"></i> Mobil Logo
                                                                        </a>
                                                                    </span>
                                                                    <input id="mobileLogo_input" class="form-control"
                                                                        type="text" name="mobileLogo"
                                                                        @if (!empty($settings['mobileLogo'])) value="{{ $settings['mobileLogo'] }}" @endif />
                                                                </div>
                                                                <div class="imageContent">
                                                                    @if (isset($settings['mobileLogo']) && !empty($settings['mobileLogo']))
                                                                        <img id="mobil_holder"
                                                                            style="margin-top:15px; max-height:100px;"
                                                                            src="{{ asset($settings['mobileLogo']) }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a id="favicon_btn" data-input="favicon_input"
                                                                            data-preview="favicon_holder"
                                                                            class="btn btn-primary">
                                                                            <i class="fa fa-picture-o"></i> Favicon
                                                                        </a>
                                                                    </span>
                                                                    <input id="favicon_input" class="form-control"
                                                                        type="text" name="favicon"
                                                                        @if (!empty($settings['favicon'])) value="{{ $settings['favicon'] }}" @endif />
                                                                </div>
                                                                <div class="imageContent">
                                                                    @if (isset($settings['favicon']) && !empty($settings['favicon']))
                                                                        <img id="favicon_holder"
                                                                            style="margin-top:15px; max-height:100px;"
                                                                            src="{{ asset($settings['favicon']) }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- /.col -->
                                                        <div class="col-md-12 mt-3 border-top pt-3">
                                                            <div class="form-group">
                                                                <label for="copyright">Copyright Metni</label><br>
                                                                <textarea id="copyright" name="copyright" class="col-md-12 form-control">
                                                                    @if (!empty($settings['copyright']))
{{ $settings['copyright'] }}
@endif
                                                                </textarea>

                                                            </div>
                                                        </div>
                                                        <!-- /.col -->

                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <!-- İletişim Bilgileri -->
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="companyName">Şirket Adı</label>
                                                            <input type="text" class="form-control" id="companyName"
                                                                name="companyName"
                                                                @if (!empty($settings['companyName'])) value="{{ $settings['companyName'] }}" @endif />
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-md-6">
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="gsm">Cep Telefonu</label>
                                                            <input type="text" class="form-control" id="gsm"
                                                                name="gsm"
                                                                @if (!empty($settings['gsm'])) value="{{ $settings['gsm'] }}" @endif />
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="phone">Sabit Hat</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone"
                                                                @if (!empty($settings['phone'])) value="{{ $settings['phone'] }}" @endif />
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="fax">Fax</label>
                                                            <input type="text" class="form-control" id="fax"
                                                                name="fax"
                                                                @if (!empty($settings['fax'])) value="{{ $settings['fax'] }}" @endif />
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="email">E-Posta</label>
                                                            <input type="text" class="form-control" id="email"
                                                                name="email"
                                                                @if (!empty($settings['email'])) value="{{ $settings['email'] }}" @endif />
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-md-6">
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <label for="location">Harita Konumu</label>
                                                            <input type="text" class="form-control" id="location"
                                                                name="location"
                                                                @if (!empty($settings['location'])) value="{{ $settings['location'] }}" @endif />
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-md-12 mt-3 border-top pt-3">
                                                        <div class="form-group">
                                                            <label for="address">Adres</label><br>
                                                            <textarea id="address" name="address" class="col-md-12 form-control">
                                                                @if (!empty($settings['address']))
{{ $settings['address'] }}
@endif
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>

                                            </div>

                                        </div>

                                        <!-- SEO Ayarları -->
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-messages-tab">
                                            <!-- /.form-group -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="title">title</label>
                                                        <input type="text" class="form-control" id="title"
                                                            name="title"
                                                            @if (!empty($settings['title'])) value="{{ $settings['title'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="author">author</label>
                                                        <input type="text" class="form-control" id="author"
                                                            name="author"
                                                            @if (!empty($settings['author'])) value="{{ $settings['author'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="description">description</label>
                                                        <textarea id="description" name="description" class="form-control">
@if (!empty($settings['description']))
{{ $settings['description'] }}
@endif
</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="keywords">keywords</label>
                                                        <textarea id="keywords" name="keywords" class="form-control">
@if (!empty($settings['keywords']))
{{ $settings['keywords'] }}
@endif
</textarea>
                                                    </div>
                                                </div>



                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="robots">robots</label>
                                                        <input type="text" class="form-control" id="robots"
                                                            name="robots"
                                                            @if (!empty($settings['robots'])) value="{{ $settings['robots'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="publisher">publisher</label>
                                                        <input type="text" class="form-control" id="publisher"
                                                            name="publisher"
                                                            @if (!empty($settings['publisher'])) value="{{ $settings['publisher'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="language">language</label>
                                                        <input type="text" class="form-control" id="language"
                                                            name="language"
                                                            @if (!empty($settings['language'])) value="{{ $settings['language'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="generator">generator</label>
                                                        <input type="text" class="form-control" id="generator"
                                                            name="generator"
                                                            @if (!empty($settings['generator'])) value="{{ $settings['generator'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="googlebot">googlebot</label>
                                                        <textarea id="googlebot" name="googlebot" class="form-control">
@if (!empty($settings['googlebot']))
{{ $settings['googlebot'] }}
@endif
</textarea>

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="bingbot">bingbot</label>
                                                        <textarea id="bingbot" name="bingbot" class="form-control">
@if (!empty($settings['bingbot']))
{{ $settings['bingbot'] }}
@endif
</textarea>

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="alexa">alexa</label>
                                                        <textarea id="alexa" name="alexa" class="form-control">
@if (!empty($settings['alexa']))
{{ $settings['alexa'] }}
@endif
</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- /.form-group -->
                                        </div>
                                        <!-- İzleme KOdları -->
                                        <div class="tab-pane fade" id="custom-tabs-four-code" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-code-tab">
                                            <div class="form-group">
                                                <label for="headerCode">headerCode</label>
                                                <textarea id="headerCode" name="headerCode" class="form-control">
@if (!empty($settings['headerCode']))
{{ $settings['headerCode'] }}
@endif
</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="footerCode">footerCode</label>
                                                <textarea id="footerCode" name="footerCode" class="form-control">
@if (!empty($settings['footerCode']))
{{ $settings['footerCode'] }}
@endif
</textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Bilgileri Kaydet</button>

                                    </div>
                                </div>
                            </form>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script src="{{ asset('/vendor/laravel-filemanager/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        var route_prefix = "{{ asset('NPanel/laravel-filemanager') }}";

        // Dosya yüklemesi için bir dizi tanımla
        var elements = ['#logo_btn', '#mobil_btn', '#favicon_btn'];

        // Her öğe için döngü oluştur
        $.each(elements, function(index, element) {
            $(element).filemanager('image', {
                prefix: route_prefix
            });
        });
    </script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/NPanel/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/NPanel/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/NPanel/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/NPanel/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('copyright', options);
        CKEDITOR.replace('address', options);
    </script>
@endsection
<script>
    function slugify(text) {
        text = text.toLowerCase()
            .replace(/ğ/g, 'g')
            .replace(/ü/g, 'u')
            .replace(/ş/g, 's')
            .replace(/ı/g, 'i')
            .replace(/ö/g, 'o')
            .replace(/ç/g, 'c')
            .replace(/\s+/g, '-')
            .replace(/[^a-z0-9-]/g, '');
        return text;
    }
</script>
