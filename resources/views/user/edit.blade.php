@extends('template.master')

@section('css-extra')
    <style>
        input {
            border: 1px solid rgba(0, 0, 0, .15) !important;
        }

        textarea:focus,
        input:focus {
            border-color: #80bdff !important;
        }

    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('admin/user/index') }}">User
                                    List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                                    {{-- <h2 style="text-align: center;">Edit User</h2>
                                    {!! Form::model($users, ['method' => 'PUT', 'action' => ['UserController@update', $users->id], 'enctype' => 'multipart/form-data']) !!}
                                    @include('user.form', ['submitButtonText'=>'Update'])
                                    {!! Form::close() !!} --}}
                                    <form method="post" action="{{ route('user.update', $users->id) }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @include('user.form', ['submitButtonText'=>'Update', 'editType' => 'user'])
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


@push('scripts')
    <script>
        function togglePassword() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                $("#changeicon").attr("class", "fas fa-eye-slash");
                x.type = "text";
            } else {
                $("#changeicon").attr("class", "fas fas fa-eye");
                x.type = "password";
            }
        }

        function togglePasswordConfirm() {
            var x = document.getElementById("inputPasswordconfirm");
            if (x.type === "password") {
                $("#changeiconconfirm").attr("class", "fas fa-eye-slash");
                x.type = "text";
            } else {
                $("#changeiconconfirm").attr("class", "fas fas fa-eye");
                x.type = "password";
            }
        }

    </script>
@endpush
