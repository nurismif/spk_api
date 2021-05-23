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
              <li class="breadcrumb-item active">Penilaian Page</li>
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
          
        <!-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="dt-buttons btn-group flex-wrap">               
          <div class="box">
                <div class="pull-right" style="padding-bottom: 20px;">
                    <a href="/admin/kriteria/create" class="btn btn-primary btn-flat" style="border-radius: 10px;">
                        <i class="fa fa-user-plus"></i> Create
                      </a>
                </div>
          </div>
          </div>
          </div>
          </div>
        </div> -->
          
          <div class="card">
          <!-- /.card-body -->
            <div class="card-body">
              <div class="container-table100">
		        	<div class="wrap-table100">
				        <div class="table100 ver1 m-b-110">
					        <div class="table100-head">
						      <table>
							    <thead>
								    <tr class="row100 head">
									    <th class="cell100 column1">No</th>
									    <th class="cell100 column2">Nama User</th>
									    <th class="cell100 column3">Umum</th>
									    <th class="cell100 column4">Nilai</th>
									    <!-- <th class="cell100 column5">Action</th> -->
								    </tr>
							    </thead>
						      </table>
					        </div>

					  <div class="table100-body js-pscroll ps ps--active-y">
						<table>
							<tbody>
              @foreach ($data as $row)
                    <tr>
                      <td class="cell100 column1">{{$no++}}</td>
                      <td class="cell100 column2">{{$row->nama}}</td>
                      <td class="cell100 column3">{{$row->nama_kriteria_ahp}}</td>
                      <td class="cell100 column4">{{$row->nilai}}</td>
                      
                    </tr>
                    @endforeach
							</tbody>
						</table>
					  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 585px; right: 5px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 293px;"></div></div></div>
				    </div>
           </div>
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
