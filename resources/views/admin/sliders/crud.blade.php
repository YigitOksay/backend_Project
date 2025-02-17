@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content asdf-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $pageTitle }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">{{ $pageTitle }}</li>
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
                            <form name="cmsForm" id="cmsForm"
                                @if (empty($sliders['id'])) action="{{ url('NPanel/sliders/crud') }}" @else
                            action="{{ url('NPanel/sliders/crud/' . $sliders['id']) }}" @endif
                                method="post">
                                @csrf
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Sayfa
                                                Bilgileri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Resim</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-four-messages" role="tab"
                                                aria-controls="custom-tabs-four-messages" aria-selected="false">Buton
                                                Ayarları</a>
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
                                        <!-- Sayfa Bilgileri -->
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
                                                        <div class="col-md-6">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="title">Slider Adı</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title"
                                                                    @if (!empty($sliders['name'])) value="{{ $sliders['name'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->


                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="orderNo">Sıra Numarası</label><br>
                                                                        <input type="number" class="form-control"
                                                                            id="orderNo" name="orderNo"
                                                                            @if (!empty($sliders['orderNo'])) value="{{ $sliders['orderNo'] }}" @endif />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="status">Durumu</label><br>
                                                                        <input type="checkbox" name="status" id="status"
                                                                            checked
                                                                            @if (!empty($sliders['status'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- /.col -->
                                                        <div class="col-md-12 mt-3 border-top pt-3">
                                                            <div class="form-group">
                                                                <label for="content">Açıklama</label><br>
                                                                <textarea id="my-editor" name="content" class="col-md-12 form-control">
                                                                    @if (!empty($sliders['description']))
{{ $sliders['description'] }}
@endif
                                                                </textarea>
                                                                <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                                                                <script>
                                                                    var options = {
                                                                        filebrowserImageBrowseUrl: '/NPanel/laravel-filemanager?type=Images',
                                                                        filebrowserImageUploadUrl: '/NPanel/laravel-filemanager/upload?type=Images&_token=',
                                                                        filebrowserBrowseUrl: '/NPanel/laravel-filemanager?type=Files',
                                                                        filebrowserUploadUrl: '/NPanel/laravel-filemanager/upload?type=Files&_token='
                                                                    };
                                                                    CKEDITOR.replace('my-editor', options);
                                                                </script>
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

                                        <!-- Dosya Yönetimi -->
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="image" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Resim Seç
                                                        </a>
                                                    </span>
                                                    <input id="image" class="form-control" type="text"
                                                        name="image"
                                                        @if (!empty($sliders['image'])) value="{{ $sliders['image'] }}" @endif />

                                                </div>
                                                <div class="imageContent">
                                                    @if (isset($sliders['image']) && !empty($sliders['image']))
                                                        <img id="holder" style="margin-top:15px; max-height:100px;"
                                                            src="{{ asset($sliders['image']) }}">
                                                    @endif
                                                </div>

                                            </div>
                                            <script>
                                                var route_prefix = "{{ asset('NPanel/laravel-filemanager') }}";
                                                $('#lfm').filemanager('image', {
                                                    prefix: route_prefix
                                                });
                                            </script>
                                        </div>

                                        <!-- SEO Ayarları -->
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-messages-tab">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="metaUrl">Slider Url</label>
                                                <input type="text" class="form-control" id="metaUrl" name="metaUrl"
                                                    @if (!empty($sliders['buttonLink'])) value="{{ $sliders['buttonLink'] }}" @endif
                                                    oninput="this.value = slugify(this.value);" />
                                            </div>

                                            <div class="form-group">
                                                <label for="metaTitle">Buton Adı</label>
                                                <input type="text" class="form-control" id="metaTitle"
                                                    name="metaTitle"
                                                    @if (!empty($sliders['buttonName'])) value="{{ $sliders['buttonName'] }}" @endif />
                                            </div>
                                            <!-- /.form-group -->
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
