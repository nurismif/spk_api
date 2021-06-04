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
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/kriteria/index') }}">Kriteria
                                    List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Kriteria</li>
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

                                <div id="users">
                                    <h2 style="text-align: center;">Edit Kriteria</h2>
                                    {!! Form::model($kriteria, ['method' => 'PUT', 'action' => ['KriteriaAHPController@update', $kriteria->id], 'enctype' => 'multipart/form-data']) !!}
                                    @include('kriteria.form', ['submitButtonText'=>'Update'])
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
