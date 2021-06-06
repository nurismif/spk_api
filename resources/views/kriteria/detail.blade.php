@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Kriteria</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/kriteria/index">Kriteria List</a></li>
                            <li class="breadcrumb-item active">Detail Kriteria Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="card w-100">
                <div class="card-body tableIndex">
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-8" data-export-title="Detail Kriteria">
                        <thead>
                            <tr class="tableHeadRow">
                                <th style="width: 1rem">No</th>
                                <th>Nama Kriteria</th>
                                <th>Kompetensi</th>
                                <th>Range Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_kriteria as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_kriteria_ahp }}</td>
                                    <td>{{ $data->kompetensi }}</td>
                                    <td>{{ $data->range_nilai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
