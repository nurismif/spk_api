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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <!-- /.card-body -->
                            <div class="card-body">
                                <div class="container-table100">
                                    <div class="wrap-table100 tableIndex w-100">
                                        <div class="panel-heading" style="padding-bottom: 20px;">
                                            <form class="form-inline" action="{{ route('matriks.update') }}"
                                                method="post">
                                                @csrf
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <select name="kriteria1" id="kriteria1" class="form-control" required>
                                                        <option value=""> - Pilih - </option>
                                                        @foreach ($list_kriteria as $kriteria)
                                                            <option value="{{ $kriteria->id }}">
                                                                {{ $kriteria->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <select name="perbandingan" id="perbandingan" class="form-control"
                                                        required>
                                                        <option value=""> - Pilih - </option>
                                                        @foreach ($list_perbandingan as $nama => $nilai)
                                                            <option value="{{ $nilai }}">
                                                                {{ $nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <select name="kriteria2" id="kriteria2" class="form-control" required>
                                                        <option value=""> - Pilih - </option>
                                                        @foreach ($list_kriteria as $kriteria)
                                                            <option value="{{ $kriteria->id }}">
                                                                {{ $kriteria->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <button class="btn btn-primary">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                        Ubah
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    @foreach ($matriks as $nama => $perbandingan_list)
                                                        <th>{{ $nama }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($matriks as $nama => $perbandingan_list)
                                                    <tr>
                                                        <th>{{ $nama }}</th>
                                                        @foreach ($perbandingan_list as $perbandingan)
                                                            <td>{{ number_format($perbandingan, 2) }}</td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
