@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Penilaian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('penilaian.index') }}">Penilaian
                                    List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Penilaian</li>
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

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div>
                                    <h2 style="text-align: center;">Update Penilaian</h2>
                                    <form action=" {{ route('penilaian.update', $user_id) }} " method="post"
                                        enctype="multipart/form-data">
                                        @csrf @method('PATCH')
                                        <div class="main">
                                            <div class="main-content">
                                                <div class="container-fluid">
                                                    <div class="panel">
                                                        <div class="panel-body m-t-20">
                                                            <div style="margin: 1rem;" class="form-group row">
                                                                <label for="inputNamaKriteria"
                                                                    class="col-sm-2 col-form-label">Nama Guru</label>
                                                                <div class="col-sm-10">
                                                                    <select name="user_id" id="user-id" disabled
                                                                        class="form-control @error('user_id') is-invalid @enderror">
                                                                        <option value="">Pilih Guru</option>
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}"
                                                                                {{ $user->id == $user_id ? 'selected' : '' }}>
                                                                                {{ $user->nama }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error('user_id')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            @foreach ($kriteria_list as $i => $kriteria)
                                                                <div style="margin: 1rem;" class="form-group row">
                                                                    <label for="inputBobot"
                                                                        class="col-sm-2 col-form-label">Kriteria
                                                                        {{ $kriteria->nama }}</label>
                                                                    <div class="col-sm-10">
                                                                        <div
                                                                            class="form-control @error('kriteria_values[{{ $kriteria->id }}]') is-invalid @enderror">
                                                                            <input class="w-100" type="text"
                                                                                placeholder="Masukan Nilai Kriteria {{ $kriteria->nama }}"
                                                                                name="kriteria_values[{{ $kriteria->id }}]"
                                                                                value="{{ $penilaian_list[$i]->nilai }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <div class="form-group"
                                                                style="padding-top: 20px; width: 25%; margin: auto;">
                                                                <button type="submit" class="btn btn-primary form-control">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
