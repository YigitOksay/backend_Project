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
                            <li class="breadcrumb-item active">Aktiviteler</li>
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
                            <form name="activitiesForm" id="activitiesForm" action="{{ url('NPanel/activities/update/1') }}"
                                method="post">
                                @csrf
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">Sayfa İçeriği</a>
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
                                        <!-- Site Yönetimi -->
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-home-tab">

                                            <!-- SELECT2 EXAMPLE -->
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Sayfa Bilgileri</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">Başlık</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title"
                                                                    @if (!empty($activities['title'])) value="{{ $activities['title'] }}" @endif />
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="subTitle">Alt Başlık</label>
                                                                <input type="text" class="form-control" id="subTitle"
                                                                    name="subTitle"
                                                                    @if (!empty($activities['subTitle'])) value="{{ $activities['subTitle'] }}" @endif />
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="leftTitle">Sol Başlık</label>
                                                                <input type="text" class="form-control" id="leftTitle"
                                                                    name="leftTitle"
                                                                    @if (!empty($activities['leftTitle'])) value="{{ $activities['leftTitle'] }}" @endif />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="rightTitle">Sağ Başlık</label>
                                                                <input type="text" class="form-control" id="rightTitle"
                                                                    name="rightTitle"
                                                                    @if (!empty($activities['rightTitle'])) value="{{ $activities['rightTitle'] }}" @endif />
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->

                                                        <!-- /.col -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="leftContent">Sol Açıklama</label>
                                                                <textarea id="leftContent" name="leftContent" class="col-md-12 form-control summernote">
@if (!empty($activities['leftContent']))
{{ $activities['leftContent'] }}
@endif
</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- /.col -->



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="rightContent">Sağ Açıklama</label>
                                                                <textarea id="rightContent" name="rightContent" class="col-md-12 form-control summernote">
@if (!empty($activities['rightContent']))
{{ $activities['rightContent'] }}
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
                                                                    @if (!empty($imageGallery["image{$i}"])) value="{{ $imageGallery["image{$i}"] }}" @endif />
                                                            </div>
                                                            <div class="imageContent" style="height: 150px">
                                                                @php
                                                                    $imageExists = false;
                                                                @endphp
                                                                @foreach ($imageGallery as $image)
                                                                    @if ($image['room_id'] == $activities['id'] && $image['image_id'] == $i)
                                                                        <div>
                                                                            <img id="holder{{ $i }}"
                                                                                style="margin-top:15px; max-height:100px;"
                                                                                src="{{ asset($image['image_path']) }}">
                                                                            <button type="button"
                                                                                class="btn btn-danger delete-image"
                                                                                data-image-id="{{ $image['id'] }}">
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
                                                            var deleteUrl = "/NPanel/activities/images/delete" + (imageId ? "/" + imageId : "");

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
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="meta_title">meta_title</label>
                                                        <input type="text" class="form-control" id="meta_title"
                                                            name="meta_title"
                                                            @if (!empty($activities['meta_title'])) value="{{ $activities['meta_title'] }}" @endif
                                                            oninput="this.value = slugify(this.value);" />
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="meta_description">meta_description</label>
                                                        <textarea id="meta_description" name="meta_description" class="form-control">
@if (!empty($activities['meta_description']))
{{ $activities['meta_description'] }}
@endif
</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="meta_keywords">meta_keywords</label>
                                                        <textarea id="meta_keywords" name="meta_keywords" class="form-control">
@if (!empty($activities['meta_keywords']))
{{ $activities['meta_keywords'] }}
@endif
</textarea>
                                                    </div>
                                                </div>

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
