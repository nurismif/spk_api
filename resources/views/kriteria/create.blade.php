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
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/kriteria/index') }}">Kriteria
                                    List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Kriteria</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="users">
                                    <h2 style="text-align: center;">Add Kriteria</h2>
                                    <form action=" {{ route('kriteria.store') }} " method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @include('kriteria.form', ['submitButtonText'=>'SAVE'])
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
