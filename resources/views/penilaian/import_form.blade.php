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
          
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
          <div class="col-sm-12 col-md-6">
          <div class="dt-buttons btn-group flex-wrap">               
          <div class="box">
              <div class="pull-right" style="padding-bottom: 20px;">
                <form method="POST" action="{{route('import')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="file"> Choose File </label>
                        <table>
                          <td><input type="file" name="file" class="form-control" style="padding-bottom: 20px;"/></td>
                          <td><input type="submit" class="btn btn-primary btn-flat" style="border-radius: 10px;" value="Submit" /></td>                           
                        </table>
                    </div>  
                </form>
              </div>
          </div>
          </div>
          </div>
          </div>
        </div>

            <!-- .card header -->
            <!-- <div class="card"> -->
              <!-- /.card-body -->
              <!-- <div class="card-body">
                <div class="container-table100">
		        	    <div class="wrap-table100">  
                  </div>
                </div> -->
              <!-- /card-body -->
              <!-- </div> -->
            <!-- /card-header -->
            <!-- </div> -->

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
