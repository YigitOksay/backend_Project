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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Parola Güncelleme</li>
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
                                <h3 class="card-title">Parola Güncelleme</h3>
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
                            <!-- form start -->
                            <form method="post" action="{{ url('NPanel/update-password') }}"> @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">E-Posta Adresiniz</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="{{ Auth::guard('admin')->user()->email }}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Eski Parolanızı Girin</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password"
                                            name="password">
                                        <span id="verifyCurrentPwd"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="newPassword">Yeni Parolanızı Girin</label>
                                        <input type="password" class="form-control" id="newPassword" placeholder="Password"
                                            name="newPassword">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirmPassword">Parolanızı Tekrar Girin</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Password" name="confirmPassword">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Parolamı Güncelle</button>
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
