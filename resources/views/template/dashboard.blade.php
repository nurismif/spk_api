@extends('template.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$count_user}}</h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-home"></i>
            </div>
            <a href="/admin/user/index" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$count_kriteria}}<sup style="font-size: 20px"></sup></h3>
              <p>Kriteria</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$count_penilaian}}</h3>

              <p>Penilaian</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable ui-sortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>
                  <canvas id="revenue-chart-canvas" height="300" style="height: 300px; display: block; width: 723px;" width="723" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="0" style="height: 0px; display: block; width: 0px;" class="chartjs-render-monitor" width="0"></canvas>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>


        <section class="col-lg-5 connectedSortable ui-sortable">
          <!-- Calendar -->
          <div class="card bg-gradient-success">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                    <i class="fas fa-bars"></i>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a href="#" class="dropdown-item">Add new event</a>
                    <a href="#" class="dropdown-item">Clear events</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">View calendar</a>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%">
                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                  <ul class="list-unstyled">
                    <li class="show">
                      <div class="datepicker">
                        <div class="datepicker-days" style="">
                          <table class="table table-sm">
                            <thead>
                              <tr>
                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th>
                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">May 2021</th>
                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                              </tr>
                              <tr>
                                <th class="dow">Su</th>
                                <th class="dow">Mo</th>
                                <th class="dow">Tu</th>
                                <th class="dow">We</th>
                                <th class="dow">Th</th>
                                <th class="dow">Fr</th>
                                <th class="dow">Sa</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td data-action="selectDay" data-day="04/25/2021" class="day old weekend">25</td>
                                <td data-action="selectDay" data-day="04/26/2021" class="day old">26</td>
                                <td data-action="selectDay" data-day="04/27/2021" class="day old">27</td>
                                <td data-action="selectDay" data-day="04/28/2021" class="day old">28</td>
                                <td data-action="selectDay" data-day="04/29/2021" class="day old">29</td>
                                <td data-action="selectDay" data-day="04/30/2021" class="day old">30</td>
                                <td data-action="selectDay" data-day="05/01/2021" class="day weekend">1</td>
                              </tr>
                              <tr>
                                <td data-action="selectDay" data-day="05/02/2021" class="day weekend">2</td>
                                <td data-action="selectDay" data-day="05/03/2021" class="day">3</td>
                                <td data-action="selectDay" data-day="05/04/2021" class="day">4</td>
                                <td data-action="selectDay" data-day="05/05/2021" class="day">5</td>
                                <td data-action="selectDay" data-day="05/06/2021" class="day">6</td>
                                <td data-action="selectDay" data-day="05/07/2021" class="day">7</td>
                                <td data-action="selectDay" data-day="05/08/2021" class="day weekend">8</td>
                              </tr>
                              <tr>
                                <td data-action="selectDay" data-day="05/09/2021" class="day weekend">9</td>
                                <td data-action="selectDay" data-day="05/10/2021" class="day">10</td>
                                <td data-action="selectDay" data-day="05/11/2021" class="day">11</td>
                                <td data-action="selectDay" data-day="05/12/2021" class="day">12</td>
                                <td data-action="selectDay" data-day="05/13/2021" class="day">13</td>
                                <td data-action="selectDay" data-day="05/14/2021" class="day">14</td>
                                <td data-action="selectDay" data-day="05/15/2021" class="day weekend">15</td>
                              </tr>
                              <tr>
                                <td data-action="selectDay" data-day="05/16/2021" class="day weekend">16</td>
                                <td data-action="selectDay" data-day="05/17/2021" class="day">17</td>
                                <td data-action="selectDay" data-day="05/18/2021" class="day">18</td>
                                <td data-action="selectDay" data-day="05/19/2021" class="day">19</td>
                                <td data-action="selectDay" data-day="05/20/2021" class="day">20</td>
                                <td data-action="selectDay" data-day="05/21/2021" class="day">21</td>
                                <td data-action="selectDay" data-day="05/22/2021" class="day weekend">22</td>
                              </tr>
                              <tr>
                                <td data-action="selectDay" data-day="05/23/2021" class="day weekend">23</td>
                                <td data-action="selectDay" data-day="05/24/2021" class="day">24</td>
                                <td data-action="selectDay" data-day="05/25/2021" class="day">25</td>
                                <td data-action="selectDay" data-day="05/26/2021" class="day">26</td>
                                <td data-action="selectDay" data-day="05/27/2021" class="day">27</td>
                                <td data-action="selectDay" data-day="05/28/2021" class="day">28</td>
                                <td data-action="selectDay" data-day="05/29/2021" class="day weekend">29</td>
                              </tr>
                              <tr>
                                <td data-action="selectDay" data-day="05/30/2021" class="day ">30</td>
                                <td data-action="selectDay" data-day="05/31/2021" class="day active today weekend">31</td>
                                <td data-action="selectDay" data-day="06/01/2021" class="day new">1</td>
                                <td data-action="selectDay" data-day="06/02/2021" class="day new">2</td>
                                <td data-action="selectDay" data-day="06/03/2021" class="day new">3</td>
                                <td data-action="selectDay" data-day="06/04/2021" class="day new">4</td>
                                <td data-action="selectDay" data-day="06/05/2021" class="day new weekend">5</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="datepicker-months" style="display: none;">
                          <table class="table-condensed">
                            <thead>
                              <tr>
                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th>
                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th>
                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month active">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="datepicker-years" style="display: none;">
                          <table class="table-condensed">
                            <thead>
                              <tr>
                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="datepicker-decades" style="display: none;">
                          <table class="table-condensed">
                            <thead>
                              <tr>
                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
                                <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </li>
                    <li class="picker-switch accordion-toggle"></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection



<div class="daterangepicker ltr show-ranges opensright">
  <div class="ranges">
    <ul>
      <li data-range-key="Today">Today</li>
      <li data-range-key="Yesterday">Yesterday</li>
      <li data-range-key="Last 7 Days">Last 7 Days</li>
      <li data-range-key="Last 30 Days">Last 30 Days</li>
      <li data-range-key="This Month">This Month</li>
      <li data-range-key="Last Month">Last Month</li>
      <li data-range-key="Custom Range">Custom Range</li>
    </ul>
  </div>
  <div class="drp-calendar left">
    <div class="calendar-table"></div>
    <div class="calendar-time" style="display: none;"></div>
  </div>
  <div class="drp-calendar right">
    <div class="calendar-table"></div>
    <div class="calendar-time" style="display: none;"></div>
  </div>
  <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
</div>