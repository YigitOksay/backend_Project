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
                                @if (empty($feature['id'])) action="{{ url('NPanel/rooms/features/crud') }}" @else
                            action="{{ url('NPanel/rooms/features/crud/' . $feature['id']) }}" @endif
                                method="post">
                                @csrf
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true">İçerik</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false">Dosya
                                                Yönetmi</a>
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
                                                    <h3 class="card-title">Sayfa Bilgileri</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <!-- /.form-group -->
                                                            <div class="form-group">
                                                                <label for="title">Sayfa Adı</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title"
                                                                    @if (!empty($feature['title'])) value="{{ $feature['title'] }}" @endif />
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
                                                                            @if (!empty($feature['orderNo'])) value="{{ $feature['orderNo'] }}" @endif />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="status">Durumu</label><br>
                                                                        <input type="checkbox" name="status" id="status"
                                                                            checked
                                                                            @if (!empty($feature['status'] === 1)) checked @endif
                                                                            data-bootstrap-switch>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


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
                                                    @if (isset($feature['image']) && !empty($feature['image']))
                                                        <img id="holder" style="margin-top:15px; max-height:100px;"
                                                            src="{{ asset($pages['image']) }}">
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
