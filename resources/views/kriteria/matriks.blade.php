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

        <!-- Modal -->
        <div class="modal fade" id="modalTingatKepentingan" tabindex="-1" role="dialog"
            aria-labelledby="modalTingatKepentinganTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Tingkat Kepentingan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col w-4">Nilai</th>
                                    <th scope="col">Tingat Kepentingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_perbandingan as $nama => $nilai)
                                    <tr>
                                        <td>{{ $nilai }}</td>
                                        <td>{{ $nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="card w-100">
                <div class="card-header">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <div class="box p-0" style="padding-bottom: 10px;">
                                        <form class="form-inline" action="{{ route('matriks.update') }}" method="post">
                                            @csrf
                                            <div class="form-group" style="padding-right: 10px;">
                                                <select name="kriteria1" id="kriteria1" class="form-control" required>
                                                    <option value=""> - Pilih Kriteria - </option>
                                                    @foreach ($list_kriteria as $kriteria)
                                                        <option value="{{ $kriteria->id }}">
                                                            {{ $kriteria->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="perbandingan" id="perbandingan" class="form-control" required>
                                                    <option value=""> - Pilih Tingkat Kepentingan - </option>
                                                    @foreach ($list_perbandingan as $nama => $nilai)
                                                        <option value="{{ $nilai }}">
                                                            {{ $nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div style="margin-left: 10px; margin-right: 10px;">
                                                <a href="#" data-toggle="modal" data-target="#modalTingatKepentingan">
                                                    <i class="far fa-question-circle"></i>
                                                </a>
                                            </div>
                                            <div class="form-group" style="padding-right: 10px;">
                                                <select name="kriteria2" id="kriteria2" class="form-control" required>
                                                    <option value=""> - Pilih Kriteria Target - </option>
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
                            <div style="display: flex; justify-content:flex-end" class="col-md-2">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <div class="box p-0" style="padding-bottom: 10px;">
                                        <div class="pull-right">
                                            <form action="{{ route('matriks.reset') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-flat"
                                                    style="border-radius: 5px;"> Reset Perubahan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body tableIndex">
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-8"
                        data-export-title="Matriks Kriteria" no-action="true">
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
                                        <td style="width: 10rem">{{ $perbandingan }}</td>
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
