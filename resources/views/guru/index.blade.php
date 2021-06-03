@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Guru</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Guru Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="card  w-100">
                                    <div class="card-body">
                                        <div class="container-table100">
                                            <div class="wrap-table100  w-100 tableIndex">
                                                <div class="table100 ver1 m-b-110">
                                                    <div class="table100-head">
                                                        <table>
                                                            <thead>
                                                                <tr class="row100 head">
                                                                    <th class="cell100 column1">No</th>
                                                                    <th class="cell100 column2">Nama</th>
                                                                    <th class="cell100 column3">NIP</th>
                                                                    <th class="cell100 column4">Jurusan</th>
                                                                    <th class="cell100 column5">Action</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                    <div class="table100-body js-pscroll ps ps--active-y">
                                                        <table>
                                                            <tbody>
                                                                @foreach ($user as $data)
                                                                    <tr>
                                                                        <td class="cell100 column1">{{ $no++ }}</td>
                                                                        <td class="cell100 column2">{{ $data->nama }}</td>
                                                                        <td class="cell100 column3">{{ $data->nip }}</td>
                                                                        <td class="cell100 column4">{{ $data->jurusan }}
                                                                        </td>
                                                                        <td class="cell100 column5">
                                                                            <form
                                                                                action="{{ url('admin/teacher') }}/{{ $data->id }}"
                                                                                method="POST">
                                                                                @csrf @method('DELETE')
                                                                                <a href="{{ url('admin/teacher') }}/{{ $data->id . '/edit' }}"
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
