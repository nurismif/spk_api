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
                                        <div class="col-sm-12">
                                          {{-- table library --}}
                                            <div class="container-table100">
                                                <div class="wrap-table100 w-100">
                                                    <div class="table100 ver1 m-b-110">
                                                        <div class="table100-head">
                                                            <table>
                                                                <thead>
                                                                    <tr class="row100 head">
                                                                        <th class="cell100 column1">No</th>
                                                                        <th class="cell100 column2">Nama</th>
                                                                        <th class="cell100 column3">Jurusan</th>
                                                                        <th class="cell100 column4">Nilai</th>
                                                                        <th class="cell100 column5">Ranking</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>

                                                        <div class="table100-body js-pscroll ps ps--active-y">
                                                            <table>
                                                                <tbody>
                                                                      <tr>
                                                                          <td class="cell100 column1">
                                                                            1
                                                                          </td>
                                                                          <td class="cell100 column2">
                                                                            2
                                                                          </td>
                                                                          <td class="cell100 column3">
                                                                            3
                                                                          </td>
                                                                          <td class="cell100 column4">
                                                                            4
                                                                          </td>
                                                                          <td class="cell100 column5">
                                                                           5  
                                                                          </td>
                                                                      </tr>
                                                                      
                                                                      <tr>
                                                                          <td class="cell100 column1">
                                                                            1
                                                                          </td>
                                                                          <td class="cell100 column2">
                                                                            2
                                                                          </td>
                                                                          <td class="cell100 column3">
                                                                            3
                                                                          </td>
                                                                          <td class="cell100 column4">
                                                                            4
                                                                          </td>
                                                                          <td class="cell100 column5">
                                                                          5  
                                                                          </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            {{-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                        </div>
                                                        <div class="ps__rail-y" style="top: 0px; height: 585px; right: 5px;">
                                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 293px;"></div>
                                                        </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending">No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1">Nama</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1">Jurusan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1">Nilai</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1">Ranking</th>
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
