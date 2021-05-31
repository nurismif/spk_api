@extends('template.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>AHP Method</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">AHP Method Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card-header -->

          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <!-- <div class="col-sm-12 col-md-6">
          <div class="dt-buttons btn-group flex-wrap">               
          <div class="box">
                <div class="pull-right">
                    <a href="#" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
          </div>
          </div>
          </div> -->
            </div>
          </div>

          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap">

                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jurusan</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nilai</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Ranking</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr class="odd">
                          <td class="dtr-control sorting_1" tabindex="0">1</td>
                          <td>Nur Ismi Fahmia</td>
                          <td>Animasi</td>
                          <td>0.0987</td>
                          <td>2</td>
                        </tr>
                        <tr class="even">
                          <td class="dtr-control sorting_1" tabindex="0">2</td>
                          <td>Miranti Eka</td>
                          <td>Multimedia</td>
                          <td>0.0887</td>
                          <td>7</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
  </section>
</div>
@endsection