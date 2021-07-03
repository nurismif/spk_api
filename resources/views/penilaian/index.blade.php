@extends('template.master')

@section('content')
    <div class="content-wrapper">
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
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Import Penilaian</h5>
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
                                    <td><input type="file" name="file" class="form-control" style="padding-bottom: 20px;" />
                                    </td>
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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
                                                                <a href="{{ route('penilaian.create') }}"
                                                                    class="btn btn-primary btn-flat"
                                                                    style="border-radius: 5px;">
                                                                    <i class="fa fa-user-plus"></i> Create
                                                                </a>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-flat rounded"
                                                                    data-toggle="modal" data-target="#exampleModalCenter">
                                                                    <i class="fa fa-upload mr-2"></i>Import
                                                                </button>
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
                                        data-export-title="Penilaian">
                                        <thead>
                                            <tr class="tableHeadRow">
                                                <th style="width: 1rem">No</th>
                                                <th>Nama User</th>
                                                @foreach ($kriteria_list as $kriteria)
                                                    <th>{{ $kriteria->nama }}</th>
                                                @endforeach
                                                @if (Auth::user()->jabatan == User::KEPSEK_ROLE)
                                                    <th style="width: 6rem">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penilaian_list as $i => $penilaian)
                                                <tr>
                                                    <td class="centerThingsColumn">{{ $i + 1 }}</td>
                                                    <td>{{ $penilaian[0]->user->nama }}</td>
                                                    @foreach ($penilaian as $item)
                                                        <td>{{ $item->nilai }}</td>
                                                    @endforeach

                                                    @if (Auth::user()->jabatan == User::KEPSEK_ROLE)
                                                        <td class="centerThingsColumn">
                                                            <a href="{{ route('penilaian.edit', $penilaian[0]->user->id) }}"
                                                                class="btn btn-warning btn-sm mr-1">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('penilaian.destroy', $penilaian[0]->user->id) }}"
                                                                method="POST">
                                                                @csrf @method('DELETE')
                                                                <button class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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
