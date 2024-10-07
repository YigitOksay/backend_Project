@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Anasayfa Modülleri</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Anasayfa Modülleri</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title float-right">
                                    <a class="btn btn-success" href="{{ url('NPanel/homepage/crud') }}"> <i
                                            class="fas fa-plus"></i> <span>Modül Ekle</span> </a>
                                </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="pages" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sıra No</th>
                                            <th>Modül Adı</th>
                                            <th>Ekleyen Kişi</th>
                                            <th>Güncelleyen Kişi</th>
                                            <th>Eklenme Tarihi</th>
                                            <th>Güncelleme Tarihi</th>
                                            <th width="5%">Durum</th>
                                            <th width="10%">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($homepage as $home)
                                            <tr>
                                                <td>{{ $home['order'] }}</td>
                                                <td>{{ $home['title'] }}</td>
                                                <td>
                                                    @foreach ($users as $user)
                                                        @if ($user['id'] == $home['createUserId'])
                                                            {{ $user['name'] }}
                                                        @break
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($users as $user)
                                                    @if ($user['id'] == $home['updateUserId'])
                                                        {{ $user['name'] }}
                                                    @break
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>{{ $home['created_at'] ? \Carbon\Carbon::parse($home['created_at'])->format('d/m/Y H:i') : '' }}
                                        </td>
                                        <td>{{ $home['updated_at'] ? \Carbon\Carbon::parse($home['updated_at'])->format('d/m/Y H:i') : '' }}
                                        </td>
                                        <td>
                                            @if ($home['status'] == 1)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Pasif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-dark"
                                                href="{{ url('NPanel/homepage/crud/' . $home['id']) }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal-{{ $home['id'] }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{ $home['id'] }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Silmek
                                                                istediğinizden emin misiniz?</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Seçmiş olduğunuz Tipi silmek üzeresiniz. Bu işlem
                                                            yapıldıktan sonra geri alınamaz. Silmek istediğinize
                                                            emin
                                                            misiniz?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Hayır</button>
                                                            <a href="{{ url('NPanel/homepage/delete/' . $home['id']) }}"
                                                                class="btn btn-primary">Evet</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sıra No</th>
                                    <th>Modül Adı</th>
                                    <th>Ekleyen Kişi</th>
                                    <th>Güncelleyen Kişi</th>
                                    <th>Eklenme Tarihi</th>
                                    <th>Güncelleme Tarihi</th>
                                    <th width="5%">Durum</th>
                                    <th width="10%">İşlemler</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
</div>
<!-- /.content-wrapper -->
@endsection
