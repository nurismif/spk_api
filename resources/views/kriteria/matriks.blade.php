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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kriteria Page</li>
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

                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dt-buttons btn-group flex-wrap">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <!-- /.card-body -->
                            <div class="card-body">
                                <div class="container-table100">
                                    <div class="wrap-table100 tableIndex w-100">
                                        <div class="panel-heading" style="padding-bottom: 20px;">
                                            <form class="form-inline" action="?m=rel_kriteria" method="post">
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <select nama="kriteria" id="kriteria" class="form-control" require>
                                                        <option value=""> - Pilih - </option>
                                                        <?php foreach ($list_kriteria as $kriteria) { ?>
                                                        <option
                                                            value="<?php echo $kriteria->id; ?>">
                                                            {{ $kriteria->nama }}</option>;
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <select nama="perbandingan" id="perbandingan" class="form-control"
                                                        require>
                                                        <option value=""> - Pilih - </option>
                                                        <?php foreach ($list_perbandingan as $perbandingan) {
                                                        ?>
                                                        <option
                                                            value="<?php echo $perbandingan->id; ?>">
                                                            {{ $perbandingan->nama }}</option>;
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <select nama="kriteria" id="kriteria" class="form-control" require>
                                                        <option value=""> - Pilih - </option>
                                                        <?php foreach ($list_kriteria as $kriteria) { ?>
                                                        <option
                                                            value="<?php echo $kriteria->id; ?>">
                                                            {{ $kriteria->nama }}</option>;
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="padding-right: 10px;">
                                                    <button class="btn btn-primary"><span
                                                            class="glyphicon glyphicon-edit"></span> Ubah
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>C01</th>
                                                    <th>C02</th>
                                                    <th>C03</th>
                                                    <th>C04</th>
                                                    <th>C05</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>C01</th>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <th>C02</th>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <th>C03</th>
                                                    <td>0.333</td>
                                                    <td>0.5</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr>
                                                    <th>C04</th>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <th>C05</th>
                                                    <td>0.333</td>
                                                    <td>1</td>
                                                    <td>0.5</td>
                                                    <td>0.333</td>
                                                    <td>1</td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    <!-- /card-body -->
                                </div>
                                <!-- /card-header -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
        </section>
        </section>
    </div>
@endsection
