@extends('template.master')

@section('content')
    <div class="content-wrapper">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body tableIndex">
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-8">
                        <thead>
                            <tr class="tableHeadRow">
                                <th>Kode</th>
                                @foreach ($matriks as $nama => $perbandingan_list)
                                    <th>{{ $nama }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks as $nama => $perbandingan_list)
                                <tr>
                                    <th style="width: 10rem">{{ $nama }}</th>
                                    @foreach ($perbandingan_list as $perbandingan)
                                        <td style="width: 10rem">{{ number_format($perbandingan, 2) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
