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
                <div class="card card-primary card-outline card-outline-tabs">
                    <form name="cmsForm" id="cmsForm"
                        @if (empty($type['id'])) action="{{ url('NPanel/menus/types/crud') }}" @else
                    action="{{ url('NPanel/menus/types/crud/' . $type['id']) }}" @endif
                        method="post">
                        @csrf
                        <div class="col-md-12 p-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="title">Tip Adı</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            @if (!empty($type['title'])) value="{{ $type['title'] }}" @endif />
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="positionId">Konum </label>
                                        <select class="form-control select2bs4" style="width: 100%;" name="positionId"
                                            id="positionId">

                                            <option value="0"> Sayfa Seçin </option>
                                            <option value="1" {{ $type['position_id'] == 1 ? 'selected' : '' }}>
                                                Üst Kısım </option>
                                            <option value="2" {{ $type['position_id'] == 2 ? 'selected' : '' }}>
                                                Alt Kısım </option>
                                            <option value="3" {{ $type['position_id'] == 3 ? 'selected' : '' }}>
                                                Sol Kısım </option>
                                            <option value="4" {{ $type['position_id'] == 4 ? 'selected' : '' }}>
                                                Orta Kısım </option>
                                            <option value="5" {{ $type['position_id'] == 5 ? 'selected' : '' }}>
                                                Sağ Kısım </option>


                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <button type="submit" class="btn btn-primary">Bilgileri Kaydet</button>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
