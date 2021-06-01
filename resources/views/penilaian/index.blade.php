@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Penilaian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Penilaian Page</li>
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
                                <div class="col-sm-12 col-md-6">
                                    {{-- <div class="dt-buttons btn-group flex-wrap">
                                        <div class="box">
                                            <div class="pull-right" style="padding-bottom: 20px;">
                                                <a href="/admin/penilaian/import_form" class="btn btn-primary btn-flat"
                                                    style="border-radius: 10px;">
                                                    <i class="fa fa-upload"></i> Import
                                                  </a>
                                                </div>
                                              </div>
                                            </div> --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-flat rounded mb-4" data-toggle="modal" data-target="#exampleModalCenter">
                                      <i class="fa fa-upload mr-2"></i>Import
                                    </button>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Import Kriteria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                                        @csrf
                                      <div class="modal-body">
                                          <div class="form-group">
                                              <label for="file"> Choose File </label>
                                              <table>
                                                  <td><input type="file" name="file" class="form-control"style="padding-bottom: 20px;" /></td>
                                              </table>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                                        </div>
                                      </form>
                                </div>
                            </div>
                        </div>

                        <div class="card w-100">
                            <!-- /.card-body -->
                            <div class="card-body">
                                <div class="container-table100">
                                    <div class="wrap-table100  w-100">
                                        <div class="table100 ver1 m-b-110">
                                            <div class="table100-head">
                                                <table id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <thead>
                                                        <tr class="row100 head">
                                                            <th class="cell100 column1">No</th>
                                                            <th class="cell100 column2">Nama User</th>
                                                            <th class="cell100 column3" style="width: 20px;">Umum</th>
                                                            <th class="cell100 column4" style="width: 20px;">Teman Sejawat
                                                            </th>
                                                            <th class="cell100 column5" style="width: 20px;">Peserta didik
                                                            </th>
                                                            <th class="cell100 column6" style="width: 20px;">Wali Murid</th>
                                                            <th class="cell100 column7" style="width: 0.1px;">DI</th>
                                                            <!-- <th class="cell100 column5">Action</th> -->
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <div class="table100-body js-pscroll ps ps--active-y">
                                                <table>
                                                    <tbody>
                                                        @foreach ($penilaian as $row)
                                                            <tr>
                                                                <td class="cell100 column1">{{ $no++ }}</td>
                                                                <td class="cell100 column2">{{ $row['nama'] }}</td>
                                                                <td class="cell100 column3">{{ $row['ahp_1'] }}</td>
                                                                <td class="cell100 column4">{{ $row['ahp_2'] }}</td>
                                                                <td class="cell100 column5">{{ $row['ahp_3'] }}</td>
                                                                <td class="cell100 column6">{{ $row['ahp_4'] }}</td>
                                                                <td class="cell100 column7" style="width: 0.5px">
                                                                    {{ $row['ahp_5'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                                    </div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; height: 585px; right: 5px;">
                                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 293px;">
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card-body -->
                            </div>
                            <!-- /card-header -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </section>
    </div>
@endsection

@section('javascripts')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#datatable').DataTable();
        })

    </script>

@endsection
