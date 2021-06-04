@extends('template.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>AHP Method</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">AHP Method Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        
        <section class="content">
            <div class="card w-100">
                <div class="card-body tableIndex">
                    <table id="exam1" class="table table-hover table-bordered table-striped mt-8">
                        <thead>
                            <tr style="background-color: #4a6283; color: white;">
                                <th style="width: 1rem">No</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Nilai</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cell100 column1">
                                1
                                </td>
                                <td class="cell100 column2">
                                2
                                </td>
                                <td class="cell100 column3">
                                3
                                </td>
                                <td class="cell100 column4">
                                4
                                </td>
                                <td class="cell100 column5">
                                5  
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="cell100 column1">
                                1
                                </td>
                                <td class="cell100 column2">
                                2
                                </td>
                                <td class="cell100 column3">
                                3
                                </td>
                                <td class="cell100 column4">
                                4
                                </td>
                                <td class="cell100 column5">
                                5  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
