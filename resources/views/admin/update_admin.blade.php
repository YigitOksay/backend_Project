@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hesabım</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Profil Güncelleme</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Profil Güncelleme</h3>
                            </div>
                            <!-- /.card-header -->
                            @if (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Uyarı : </strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Başarılı : </strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- form start -->
                            <form method="post" action="{{ url('/NPanel/update-admin') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">E-Posta Adresiniz</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                                    </div>

                                    <div class="form-group">
                                        <label for="fullName">İsminiz</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName"
                                            value="{{ Auth::guard('admin')->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Telefon Numarası</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            value="{{ Auth::guard('admin')->user()->mobile }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="profileImage" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Resim Seç
                                                </a>
                                            </span>
                                            <input id="profileImage" class="form-control" type="text"
                                                name="profileImage">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;"
                                            src="{{ Auth::guard('admin')->user()->image }}">
                                    </div>
                                    <script src="{{ asset('/vendor/laravel-filemanager/js/jquery-3.7.1.min.js') }}"></script>
                                    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
                                    <script>
                                        var route_prefix = "laravel-filemanager";
                                        $('#lfm').filemanager('image', {
                                            prefix: route_prefix
                                        });
                                    </script>
                                    <!--
                                                            <div class="form-group">
                                                            <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
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
                                                        -->
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Bilgilerimi Güncelle</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
