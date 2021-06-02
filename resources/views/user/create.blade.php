@extends('template.master')

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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('user') }}">User
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
                                    <h2 style="text-align: center;">Add User</h2>
                                    <form action=" {{ route('user.store') }} " method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @include('user.form', ['submitButtonText'=>'Save'])
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
  console.log("test")
</script>
@endpush
