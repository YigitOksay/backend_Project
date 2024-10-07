  @extends('admin.layout.layout')
  @section('content')
      <!-- Content Wrapper. Contains page content asdf-->
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
                                  @if (empty($homepage['id'])) action="{{ url('NPanel/homepage/crud') }}" @else
                            action="{{ url('NPanel/homepage/crud/' . $homepage['id']) }}" @endif
                                  method="post">
                                  @csrf
                                  <div class="card-header p-0 border-bottom-0">
                                      <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                          <li class="nav-item">
                                              <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                  href="#custom-tabs-four-home" role="tab"
                                                  aria-controls="custom-tabs-four-home" aria-selected="true">Sayfa
                                                  Bilgileri</a>
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
                                                      <h3 class="card-title">Modül Bilgileri</h3>
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <!-- /.form-group -->
                                                              <div class="form-group">
                                                                  <label for="moduleId">Modül No</label>
                                                                  <input type="number" class="form-control" id="moduleId"
                                                                      name="moduleId" pattern="[0-9]*"
                                                                      @if (!empty($homepage['moduleId'])) value="{{ $homepage['moduleId'] }}" @endif />
                                                              </div>
                                                              <!-- /.form-group -->
                                                          </div>
                                                          <!-- /.col -->

                                                          <div class="col-md-4">
                                                              <!-- /.form-group -->
                                                              <div class="form-group">
                                                                  <label for="title">Modül Adı</label>
                                                                  <input type="text" class="form-control" id="title"
                                                                      name="title"
                                                                      @if (!empty($homepage['title'])) value="{{ $homepage['title'] }}" @endif />
                                                              </div>
                                                              <!-- /.form-group -->
                                                          </div>
                                                          <!-- /.col -->

                                                          <div class="col-md-4">
                                                              <!-- /.form-group -->
                                                              <div class="form-group">
                                                                  <label for="order">Modül Sıra No</label>
                                                                  <input type="number" class="form-control" id="order"
                                                                      name="order"
                                                                      @if (!empty($homepage['order'])) value="{{ $homepage['order'] }}" @endif />
                                                              </div>
                                                              <!-- /.form-group -->
                                                          </div>
                                                          <!-- /.col -->
                                                          <div class="col-md-12">
                                                              <div class="row">
                                                                  <div class="col-md-2">
                                                                      <div class="form-group">
                                                                          <label for="status">Durumu</label><br>
                                                                          <input type="checkbox" name="status"
                                                                              id="status"
                                                                              @if (!empty($homepage['status'] === 1)) checked @endif
                                                                              data-bootstrap-switch>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>

                                                          <!-- /.col -->
                                                        
                                                         
                                                            
                                                              <div class="tab-pane fade show active" id="tr"
                                                                  role="tabpanel" aria-labelledby="tr-tab">
                                                                  <div class="form-group">
                                                                      
                                                                      <textarea id="summernote" name="content">
@if (!empty($homepage['content']))
{{ $homepage['content'] }}
@endif
</textarea>
                                                                  </div>
                                                              </div>
                                                             

                                                         
                                                        
                                                      </div>
                                                      <!-- /.row -->
                                                  </div>
                                                  <!-- /.card-body -->
                                              </div>
                                              <!-- /.card -->
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
      <!-- Summernote -->
      <script>
          $(function() {
              // Summernote
              $('#summernote').summernote()
              $('#summernoteEn').summernote()
              $('#summernoteAr').summernote()
              $('#summernoteRu').summernote()
          })
      </script>
  @endsection
