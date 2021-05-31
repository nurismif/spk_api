@extends('template.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Kriteria</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Kriteria Page</li>
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
									    <th class="cell100 column2">Nama Kriteria</th>
									    <th class="cell100 column3">Kompetensi</th>
									    <th class="cell100 column4">Range Nilai</th>
								    </tr>
							    </thead>
						      </table>
					        </div>

					  <div class="table100-body js-pscroll ps ps--active-y">
						<table>
							<tbody>
              @foreach ($detail_kriteria as $data)
                    <tr>
                      <td class="cell100 column1">{{$no++}}</td>
                      <td class="cell100 column2">{{$data->nama_kriteria_ahp}}</td>
                      <td class="cell100 column3">{{$data->kompetensi}}</td>
                      <td class="cell100 column4">{{$data->range_nilai}}</td>
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
