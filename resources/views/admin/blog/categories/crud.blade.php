@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                                @if (empty($categories['id'])) action="{{ url('NPanel/blogs/categories/crud') }}" @else
                            action="{{ url('NPanel/blogs/categories/crud/' . $categories['id']) }}" @endif
                                method="post">
                                @csrf
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Bilgiler</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Dosya
                                                Yönetmi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                                href="#custom-tabs-four-messages" role="tab"
                                                aria-controls="custom-tabs-four-messages" aria-selected="false">SEO
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
                                                    <h3 class="card-title">Bilgiler</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="title">Kategori Adı</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title"
                                                                    @if (!empty($categories['title'])) value="{{ $categories['title'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-md-6">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="subPage">Üst Sayfa</label>
                                                                <select class="form-control select2bs4" style="width: 100%;"
                                                                    name="subPage" id="subPage">
                                                                    <option selected="selected" value="0"> Sayfa Seçin
                                                                    </option>
                                                                    @foreach ($allCategories as $subCategories)
                                                                        <option value="{{ $subCategories['id'] }}"
                                                                            @if (!empty($categories['parent_id']) && $categories['parent_id'] == $subCategories['id']) selected @endif>
                                                                            {{ $subCategories['title'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="orderNo">Sıra Numarası</label><br>
                                                                        <input type="number" class="form-control"
                                                                            id="orderNo" name="orderNo"
                                                                            @if (!empty($categories['orderNo'])) value="{{ $categories['orderNo'] }}" @endif />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="home_page">Anasayfada Göster</label><br>
                                                                        <input type="checkbox" name="home_page"
                                                                            id="home_page"
                                                                            @if (!empty($categories['home_page'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="status">Durumu</label><br>
                                                                        <input type="checkbox" name="status" id="status"
                                                                            checked
                                                                            @if (!empty($categories['status'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- /.col -->
                                                        <div class="col-md-12 mt-3 border-top pt-3">
                                                            <div class="form-group">
                                                                <label for="content">Kategori Açıklaması</label><br>
                                                                <textarea id="my-editor" name="content" class="col-md-12 form-control">
                                                                @if (!empty($categories['content']))
{{ $categories['content'] }}
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
                                                        name="image">
                                                </div>
                                                <div class="imageContent">
                                                    @if (isset($categories['image']) && !empty($categories['image']))
                                                        <img id="holder" style="margin-top:15px; max-height:100px;"
                                                            src="{{ asset($categories['image']) }}">
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
                                                <label for="metaUrl">Meta Url</label>
                                                <input type="text" class="form-control" id="metaUrl" name="metaUrl"
                                                    @if (!empty($categories['url'])) value="{{ $categories['url'] }}" @endif
                                                    oninput="this.value = slugify(this.value);" />
                                            </div>

                                            <div class="form-group">
                                                <label for="metaTitle">Meta Başlık</label>
                                                <input type="text" class="form-control" id="metaTitle"
                                                    name="metaTitle"
                                                    @if (!empty($categories['meta_title'])) value="{{ $categories['meta_title'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="metaContent">Meta Açıklama</label>
                                                <textarea class="form-control" id="metaContent" name="metaContent">
@if (!empty($categories['meta_description']))
{{ $categories['meta_description'] }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="metaKey">Meta Keywords</label>
                                                <textarea class="form-control" id="metaKey" name="metaKey">
@if (!empty($categories['meta_keywords']))
{{ $categories['meta_keywords'] }}
@endif
</textarea>
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
            .replace(/\s+/g, '-') // boşlukları tire ile değiştir
            .replace(/[^a-z0-9-]/g, ''); // harf, rakam ve tire dışındaki karakterleri temizle
        return text;
    }
</script>
