@extends('admin.layout.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Menü</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Menü</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <form method="POST" action="{{ url('NPanel/menus/add') }}" class="form-horizontal">@csrf
                        <!-- SELECT2 EXAMPLE -->
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Ayarlar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Menü Seçin</label>
                                            <select name="menu_position_id" id="selectBox" class="form-control select2"
                                                style="width: 100%;">
                                                <option value="1" selected="selected">Üst Kısım</option>
                                                <option value="2">Alt Kısım</option>
                                                <option value="3">Sol Kısım</option>
                                                <option value="4">Orta Kısım</option>
                                                <option value="5">Sağ Kısım</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 border-top pt-3">
                                        <label>Sayfalar</label>
                                        <div class="form-group pagesList">
                                            @foreach ($pages as $page)
                                                @php
                                                    $menuExists = \App\Models\Menus::where('page_id', $page['id'])->exists();
                                                @endphp
                                                @unless ($menuExists)
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" name="selected_pages[]"
                                                                id="page_{{ $page['id'] }}" value="{{ $page['id'] }}">
                                                            <label for="page_{{ $page['id'] }}">{{ $page['title'] }}</label>
                                                        </div>
                                                    </div>
                                                @endunless
                                            @endforeach

                                        </div>
                                        <div class="col-md-12 border-top pt-3">
                                            <button type="submit" class="btn btn-success">Seçilenleri Menüye
                                                Ekle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>

                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <form id="menuForm" method="POST" action="{{ url('NPanel/menus/updateOrder') }}"
                            class="form-horizontal">@csrf
                            <div class="card-header">
                                <h3 class="card-title">Menüler</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                        <button type="submit" class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul id="menuData">
                                    @foreach ($menuses as $menu)
                                        <li data-position="{{ $menu['menu_position_id'] }}">
                                            <input type="hidden" name="menuOrder[]" value="{{ $menu['id'] }}">
                                            {{ $menu['title'] }} - {{ $menu['order_id'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Başarılı!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Menü başarıyla kaydedildi.
                </div>
            </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection
