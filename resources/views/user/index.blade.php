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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Page</li>
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
          <div class="panel-heading">        
            <form class="form-inline">
                <input type="hidden" name="m" value="kriteria">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="">
                </div>
                <div class="form-group">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh
                </button></div>
                <div class="form-group">
                    <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                </div>
                <div class="form-group">
                    <a class="btn btn-default" href="cetak.php?m=kriteria&amp;a=" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </div>
            </form>
          </div>
          </div>
          </div>
          </div>
        </div>

           <div class="card">
           <!-- /.card-header -->
           <div class="card-body">

           <div class="container-table100">
		        	<div class="wrap-table100">
				        <div class="table100 ver1 m-b-110">
					        <div class="table100-head">
						      <table>
							    <thead>
								    <tr class="row100 head">
									    <th class="cell100 column1">No</th>
									    <th class="cell100 column2">Nama</th>
									    <th class="cell100 column3">NIP</th>
                      <th class="cell100 column4">Username</th>
                      <th class="cell100 column5">Jabatan</th>
									    <th class="cell100 column6">Action</th>
								    </tr>
							    </thead>
						      </table>
					        </div>

					  <div class="table100-body js-pscroll ps ps--active-y">
						<table>
							<tbody>
              @foreach ($user as $data)
                    <tr>
                      <td class="cell100 column1">{{$no++}}</td>
                      <td class="cell100 column2">{{$data->nama}}</td>
                      <td class="cell100 column3">{{$data->nip}}</td>
                      <td class="cell100 column4">{{$data->username}}</td>
                      <td class="cell100 column5">{{$data->jabatan}}</td>
                      <td class="cell100 column6">
                        <form action="{{ url('admin/user') }}/{{ $data->id }}" method="POST">
                        @csrf @method('DELETE') 
                          <a href="{{ url('admin/user') }}/{{ $data->id.'/edit' }}" class="btn btn-warning btn-sm mr-1">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>                      
                          </form>                       
                      </td>
                    </tr>
                    @endforeach
							</tbody>
						</table>
					  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 585px; right: 5px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 293px;"></div></div></div>
				    </div>
           </div>
          </div>

          <!-- card-body -->
          </div>
        <!-- /.card -->
        </div>  
      <!-- /.col -->
      </div>
    <!-- /.row -->
    </div>
  <!-- /.container-fluid -->
  </div>
</section>
</div>
@endsection