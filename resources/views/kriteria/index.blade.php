@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kriteria</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kriteria Page</li>
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
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <div class="box">
                                            <div class="pull-right" style="padding-bottom: 20px;">
                                                <a href="/admin/kriteria/create" class="btn btn-primary btn-flat"
                                                    style="border-radius: 10px;">
                                                    <i class="fa fa-user-plus"></i> Create
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card w-100">
                            <!-- /.card-body -->
                            <div class="card-body">
                                <div class="container-table100">
                                    <div class="wrap-table100 w-100">
                                        <div class="table100 ver1 m-b-110">
                                            <div class="table100-head">
                                                <table>
                                                    <thead>
                                                        <tr class="row100 head">
                                                            <th class="cell100 column1">No</th>
                                                            <th class="cell100 column2">Nama Kriteria</th>
                                                            <th class="cell100 column3">Bobot</th>
                                                            <th class="cell100 column4">Tipe</th>
                                                            <th class="cell100 column5">Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                            <div class="table100-body js-pscroll ps ps--active-y">
                                                <table>
                                                    <tbody>
                                                        @foreach ($kriteria as $data)
                                                            <tr>
                                                                <td class="cell100 column1">{{ $no++ }}</td>
                                                                <td class="cell100 column2">{{ $data->nama }}</td>
                                                                <td class="cell100 column3">{{ $data->bobot }}</td>
                                                                <td class="cell100 column4">{{ $data->tipe }}</td>
                                                                <td class="cell100 column5">
                                                                    <form
                                                                        action="{{ url('admin/kriteria') }}/{{ $data->id }}"
                                                                        method="POST">
                                                                        @csrf @method('DELETE')
                                                                        <a href="{{ url('admin/kriteria') }}/{{ $data->id . '/detail' }}"
                                                                            class="btn btn-primary btn-sm mr-1">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        <a href="{{ url('admin/kriteria') }}/{{ $data->id . '/edit' }}"
                                                                            class="btn btn-warning btn-sm mr-1">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                        <button class="btn btn-danger btn-sm"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </td>
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
        </section>
    </div>
@endsection
