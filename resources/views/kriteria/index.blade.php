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
            </div>
        </section>


        <section class="content">
            <div class="card w-100">
                <div class="card-header">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <div class="box p-0" style="padding-bottom: 10px;">
                                        <div class="pull-right">
                                            <a href="/admin/kriteria/create" class="btn btn-primary btn-flat"
                                                style="border-radius: 5px;">
                                                <i class="fa fa-user-plus"></i> Create
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body tableIndex">
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-8"
                        data-export-title="Detail Kriteria">
                        <thead>
                            <tr class="tableHeadRow">
                                <th style="width: 1rem">No</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Tipe</th>
                                <th style="width: 7rem">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteria as $data)
                                <tr>
                                    <td class="centerThingsColumn">{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->bobot }}</td>
                                    <td>{{ $data->tipe }}</td>
                                    <td class="centerThingsColumn">
                                        <form action="{{ url('admin/kriteria') }}/{{ $data->id }}" method="POST"
                                            onsubmit="return confirm('Yakin akan hapus data')">
                                            @csrf @method('DELETE')
                                            <a href="{{ url('admin/kriteria') }}/{{ $data->id . '/detail' }}"
                                                class="btn btn-primary btn-sm mr-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('admin/kriteria') }}/{{ $data->id . '/edit' }}"
                                                class="btn btn-warning btn-sm mr-1">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
