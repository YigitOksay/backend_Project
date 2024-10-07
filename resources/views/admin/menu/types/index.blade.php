@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menü Tipleri</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item">Menü</li>
                            <li class="breadcrumb-item active">Menü Tipleri</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Menü Tipleri ve Pozisyonları</h3>
                            <div class="card-tools">
                                <ul class=" float-right">
                                    <li class="nav"><a class="btn btn-success"
                                            href="{{ url('NPanel/menus/types/crud') }}">Yeni Ekle</a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Başarılı : </strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Pozisyon Adı</th>
                                        <th>Pozisyonu</th>
                                        <th style="width: 180px">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                        <tr>
                                            <td>{{ $type['id'] }}</td>
                                            <td>{{ $type['title'] }}</td>
                                            <td>
                                                <img src="/{{ $type['image'] }}" width="35" />
                                            </td>
                                            <td>
                                                <a class="btn btn-dark"
                                                    href="{{ url('NPanel/menus/types/crud/' . $type['id']) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $type['id'] }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $type['id'] }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Silmek
                                                                    istediğinizden emin misiniz?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Seçmiş olduğunuz Tipi silmek üzeresiniz. Bu işlem
                                                                yapıldıktan sonra geri alınamaz. Silmek istediğinize emin
                                                                misiniz?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Hayır</button>
                                                                <a href="{{ url('NPanel/menus/types/delete/' . $type['id']) }}"
                                                                    class="btn btn-primary">Evet</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
