@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hasil Akhir</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Hasil Akhir Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="card w-100">
                @if (Auth::user()->jabatan == User::TIM_PKG_ROLE)
                    <div class="card-header">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <div class="box p-0" style="padding-bottom: 10px;">
                                            <div class="pull-right">
                                                <a href="{{ route('hasil.akhir.generate') }}"
                                                    class="btn btn-primary btn-flat" style="border-radius: 5px;">
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
                    <div class="row">
                        <div class="col" style="margin-bottom:10px">
                            SPK Method: <span class="text-uppercase text-bold">{{ $method }}</span>
                        </div>
                    </div>

                    @if ($method != '-')
                        <div class="row">
                            <div class="col" style="margin-bottom:10px">
                                Pengujian analisis sensivitas dengan menggunakan tiga proses menunjukkan metode
                                <span class="text-uppercase text-bold">{{ $method }}</span>
                                memiliki sentivitas dengan nilai terkecil yaitu <span
                                    class="text-uppercase text-bold">{{ $sensitivity }}</span>,
                                sehingga metode <span class="text-uppercase text-bold">{{ $method }}</span>
                                lebih sesuai untuk kasus yang diselesaikan.
                            </div>
                        </div>
                    @endif

                    @if (Auth::user()->jabatan == User::TIM_PKG_ROLE)
                        <table class="table table-hover table-bordered table-striped my-4" data-export-title="Sentivitas"
                            no-action="true" id="table-sensitivity">
                            <thead>
                                <tr class="tableHeadRow">
                                    <th style="width: 1rem">No</th>
                                    <th>SPK Methods</th>
                                    <th>Sensitivity 1</th>
                                    <th>Sensitivity 2</th>
                                    <th>Sensitivity 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($sensitivities as $key => $sensitivity)
                                    @php
                                        $i += 1;
                                    @endphp
                                    <tr>
                                        <td class="cell100 column1">
                                            {{ $i }}
                                        </td>
                                        <td class="cell100 column2 text-uppercase">
                                            {{ $key }}
                                        </td>
                                        <td class="cell100 column3">
                                            {{ $sensitivity[0] }}
                                        </td>
                                        <td class="cell100 column4">
                                            {{ $sensitivity[1] }}
                                        </td>
                                        <td class="cell100 column5">
                                            {{ $sensitivity[2] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    @endif
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-4"
                        data-export-title="Hasil Akhir Method" no-action="true">
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
                            @foreach ($method_values as $i => $method_value)
                                <tr>
                                    <td class="cell100 column1">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="cell100 column2">
                                        {{ $method_value->user->nama }}
                                    </td>
                                    <td class="cell100 column3">
                                        {{ $method_value->user->nip }}
                                    </td>
                                    <td class="cell100 column4">
                                        {{ $method_value->user->jurusan }}
                                    </td>
                                    <td class="cell100 column5">
                                        {{ $method == 'ahp' ? number_format($method_value->ahp_value, 7) : number_format($method_value->wp_value, 7) }}
                                    </td>
                                    <td class="cell100 column6">
                                        {{ $method_value->rank }}
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

@push('scripts')
    <script>
        $(function() {
            $("#table-sensitivity").DataTable(datatableConfigsGlobal);
        });
    </script>
@endpush
