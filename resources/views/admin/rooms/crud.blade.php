<?php

use App\Models\RoomsAndFeatures;

// Blade dosyasının devamı...

?>

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
                            <form name="roomsForm" id="roomsForm"
                                @if (empty($rooms['id'])) action="{{ url('NPanel/rooms/crud') }}" @else
                            action="{{ url('NPanel/rooms/crud/' . $rooms['id']) }}" @endif
                                method="post">
                                @csrf
                                <input type="hidden" id="roomSelectedId" value="{{ $rooms->id }}">

                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Bilgiler</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-features-tab" data-toggle="pill"
                                                href="#custom-tabs-features" role="tab"
                                                aria-controls="custom-tabs-features" aria-selected="false">Oda
                                                Özellikleri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Dosya
                                                Yönetimi</a>
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
                                                                <label for="title">Oda Adı</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title"
                                                                    @if (!empty($rooms['title'])) value="{{ $rooms['title'] }}" @endif />
                                                            </div>
                                                            <!-- /.form-group -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="subPage">Kategori</label>
                                                                <select class="form-control select2bs4" style="width: 100%;"
                                                                    name="subPage" id="subPage">
                                                                    <option value="0"> Kategori Seçin </option>
                                                                    @foreach ($allCategories as $subCategories)
                                                                        <option value="{{ $subCategories['id'] }}"
                                                                            {{ !empty($rooms['category_id']) && $rooms['category_id'] == $subCategories['id'] ? 'selected' : '' }}>
                                                                            {{ $subCategories['title'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="status">Durumu</label><br>
                                                                        <input type="checkbox" name="status" id="status"
                                                                            checked
                                                                            @if (!empty($rooms['status'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="homeStatus">Anasayfada<br>Görüntüle</label><br>
                                                                        <input type="checkbox" name="homeStatus" id="homeStatus"
                                                                            checked
                                                                            @if (!empty($rooms['homeStatus'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <!-- time Picker -->
                                                                        <div class="bootstrap-timepicker">
                                                                            <div class="form-group">
                                                                                <label for="entrance">Odaya Giriş
                                                                                    Saati:</label>

                                                                                <div class="input-group date"
                                                                                    id="entranceTimepicker"
                                                                                    data-target-input="nearest">
                                                                                    <input type="text"
                                                                                        class="form-control datetimepicker-input"
                                                                                        data-target="#entranceTimepicker"
                                                                                        name="entrance"
                                                                                        @if (!empty($rooms['entrance'])) value="{{ $rooms['entrance'] }}" @endif />
                                                                                    <div class="input-group-append"
                                                                                        data-target="#entranceTimepicker"
                                                                                        data-toggle="datetimepicker">
                                                                                        <div class="input-group-text"><i
                                                                                                class="far fa-clock"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.input group -->
                                                                            </div>
                                                                            <!-- /.form group -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <div class="bootstrap-timepicker">
                                                                            <div class="form-group">
                                                                                <label for="exit">Odaya Giriş
                                                                                    Saati:</label>

                                                                                <div class="input-group date"
                                                                                    id="exitTimepicker"
                                                                                    data-target-input="nearest">
                                                                                    <input type="text"
                                                                                        class="form-control datetimepicker-input"
                                                                                        data-target="#exitTimepicker"
                                                                                        name="exit"
                                                                                        @if (!empty($rooms['exit'])) value="{{ $rooms['exit'] }}" @endif />
                                                                                    <div class="input-group-append"
                                                                                        data-target="#exitTimepicker"
                                                                                        data-toggle="datetimepicker">
                                                                                        <div class="input-group-text"><i
                                                                                                class="far fa-clock"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.input group -->
                                                                            </div>
                                                                            <!-- /.form group -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="cancellation">İptal / Ön
                                                                            ödeme</label><br>
                                                                        <textarea id="cancellation" name="cancellation" class="col-md-12 form-control summernote">
@if (!empty($rooms['cancellation']))
{{ $rooms['cancellation'] }}
@endif
</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="extra">Odadan Çıkış
                                                                            Saati</label><br>
                                                                        <textarea name="extra" class="col-md-12 form-control summernote">
@if (!empty($rooms['extra']))
{{ $rooms['extra'] }}
@endif
</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pets">Evcil
                                                                            hayvanlar</label><br>
                                                                        <textarea name="pets" class="col-md-12 form-control summernote">
@if (!empty($rooms['pets']))
{{ $rooms['pets'] }}
@endif
</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="information">İlave bilgi</label><br>
                                                                        <textarea name="information" class="col-md-12 form-control summernote">
@if (!empty($rooms['information']))
{{ $rooms['information'] }}
@endif
</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- /.col -->
                                                        <div class="col-md-12 mt-3 border-top pt-3">
                                                            <div class="form-group">
                                                                <label for="content">Odaya Genel Bakış</label><br>
                                                                <textarea id="my-editor" name="content" class="col-md-12 form-control">
                                                                @if (!empty($rooms['content']))
{{ $rooms['content'] }}
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
                                        <!-- Oda Özellikleri -->
                                        <div class="tab-pane fade" id="custom-tabs-features" role="tabpanel"
                                            aria-labelledby="custom-tabs-features-tab">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Özellik Seçin</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Özellikler</label>
                                                                <select class="duallistbox" multiple="multiple"
                                                                    name="features[]">
                                                                    @foreach ($allFeatures as $feature)
                                                                        <option value="{{ $feature['id'] }}"
                                                                            {{ in_array($feature['id'], $selectedFeature) ? 'selected' : '' }}>
                                                                            {{ $feature['title'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!-- /.form-group -->
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
                                            <div class="row">
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <a id="lfm{{ $i }}"
                                                                        data-input="image{{ $i }}"
                                                                        data-preview="holder{{ $i }}"
                                                                        class="btn btn-primary">
                                                                        <i class="fa fa-picture-o"></i> Resim Seç
                                                                    </a>
                                                                </span>
                                                                <input id="image{{ $i }}" class="form-control"
                                                                    type="text" name="image{{ $i }}"
                                                                    @if (!empty($roomImages["image{$i}"])) value="{{ $roomImages["image{$i}"] }}" @endif />
                                                            </div>
                                                            <div class="imageContent" style="height: 150px">
                                                                @php
                                                                    $imageExists = false;
                                                                @endphp
                                                                @foreach ($roomImages as $roomImage)
                                                                    @if ($roomImage['room_id'] == $rooms['id'] && $roomImage['image_id'] == $i)
                                                                        <div>
                                                                            <img id="holder{{ $i }}"
                                                                                style="margin-top:15px; max-height:100px;"
                                                                                src="{{ asset($roomImage['image_path']) }}">
                                                                            <button type="button"
                                                                                class="btn btn-danger delete-image"
                                                                                data-image-id="{{ $roomImage['id'] }}">
                                                                                Sil
                                                                            </button>
                                                                        </div>
                                                                        @php
                                                                            $imageExists = true;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                @if (!$imageExists)
                                                                    <img id="holder{{ $i }}"
                                                                        style="display: none;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var route_prefix{{ $i }} = "{{ asset('NPanel/laravel-filemanager') }}";
                                                        $('#lfm{{ $i }}').filemanager('image', {
                                                            prefix: route_prefix{{ $i }}
                                                        });

                                                        // Silme butonunun tıklanma olayını dinleyelim
                                                        $('.delete-image').click(function() {
                                                            var imageId = $(this).data('image-id');
                                                            var deleteUrl = "/NPanel/rooms/images/delete" + (imageId ? "/" + imageId : "");

                                                            // Ajax isteği gönderelim
                                                            $.ajax({
                                                                url: deleteUrl,
                                                                type: 'POST',
                                                                data: {
                                                                    image_id: imageId,
                                                                    _token: '{{ csrf_token() }}'
                                                                },
                                                                success: function(response) {
                                                                    console.log('Görsel silindi:', imageId);
                                                                    // Silme işlemi başarılı olduysa, görseli sayfadan kaldırabiliriz
                                                                    $('#holder{{ $i }}').parent().remove();
                                                                },
                                                                error: function(xhr, status, error) {
                                                                    console.error('Silme hatası:', error);
                                                                    // Hata durumunda kullanıcıya uygun mesajı gösterebiliriz
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                @endfor
                                            </div>

                                        </div>




                                        <!-- SEO Ayarları -->
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-messages-tab">
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="metaUrl">Meta Url</label>
                                                <input type="text" class="form-control" id="metaUrl" name="metaUrl"
                                                    @if (!empty($rooms['url'])) value="{{ $rooms['url'] }}" @endif
                                                    oninput="this.value = slugify(this.value);" />
                                            </div>

                                            <div class="form-group">
                                                <label for="metaTitle">Meta Başlık</label>
                                                <input type="text" class="form-control" id="metaTitle"
                                                    name="metaTitle"
                                                    @if (!empty($rooms['meta_title'])) value="{{ $rooms['meta_title'] }}" @endif />
                                            </div>
                                            <div class="form-group">
                                                <label for="metaContent">Meta Açıklama</label>
                                                <textarea class="form-control" id="metaContent" name="metaContent">
@if (!empty($rooms['meta_description']))
{{ $rooms['meta_description'] }}
@endif
</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="metaKey">Meta Keywords</label>
                                                <textarea class="form-control" id="metaKey" name="metaKey">
@if (!empty($rooms['meta_keywords']))
{{ $rooms['meta_keywords'] }}
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
