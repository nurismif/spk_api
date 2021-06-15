@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>WP Method</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">WP Method Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="card w-100">
                @if (Auth::user()->jabatan != User::KEPSEK_ROLE)
                    <div class="card-header">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <div class="box p-0" style="padding-bottom: 10px;">
                                            <div class="pull-right">
                                                <a href="{{ route('wp.generate') }}" class="btn btn-primary btn-flat"
                                                    style="border-radius: 5px;">
                                                    <i class="fa fa-cog"></i> Generate
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-body tableIndex">
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-8"
                        data-export-title="WP Method" no-action="true">
                        <thead>
                            <tr class="tableHeadRow">
                                <th style="width: 1rem">No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jurusan</th>
                                <th>Nilai</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wp_methods as $i => $wp_method)
                                <tr>
                                    <td class="cell100 column1">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="cell100 column2">
                                        {{ $wp_method->user->nama }}
                                    </td>
                                    <td class="cell100 column3">
                                        {{ $wp_method->user->nip }}
                                    </td>
                                    <td class="cell100 column4">
                                        {{ $wp_method->user->jurusan }}
                                    </td>
                                    <td class="cell100 column5">
                                        {{ number_format($wp_method->wp_value, 7) }}
                                    </td>
                                    <td class="cell100 column6">
                                        {{ $wp_method->rank }}
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
