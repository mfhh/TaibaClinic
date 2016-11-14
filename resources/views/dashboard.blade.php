@extends('layouts.master')
@section('titel','Dashboard')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Capacity</p>
                                            105GB
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Revenue</p>
                                            $1,345
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Errors</p>
                                            23
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> In the last hour
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">@section('titel','patient')

                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-twitter-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Followers</p>
                                            +45
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-9 col-sm-9">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="ti-plus"></i> Visit By Patient</h4>
                            </div>
                            <div class="content">
                                @if (Session::has('message'))
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                @endif
                                <form action="{{ url ('visit_check') }}" method="POST" enctype="multipart/form-data" >
                                    {!! csrf_field() !!}
                                      <div class="row">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label>Patient</label>
                                                        <input list="patient" required="true" name="patient" class="form-control border-input">
                                                  <datalist id="patient">
                                                      <?php $patients = App\Patient::all(); ?>
                                                    @foreach ($patients as $value)
                                                    <option value="{{$value->patient_name}}">
                                                    @endforeach
                                                  </datalist>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label>Date</label>
                                                  <input type="date" required="true" name="visit_date"class="form-control border-input" placeholder="visit_date">
                                              </div>
                                          </div>
                                          <div class="col-md-2">
                                              <div class="form-group">
                                                  <label>Shift</label>
                                                <select id="Shift_id" name="Shift_id" class="form-control border-input" required="true">
                                                      <option value="1">Morning</option>
                                                      <option value="2">Evening</option>
                                                </select>
                                               </div>
                                          </div>                                          
                                          <div class="col-md-1">
                                              <div class="form-group">
                                                  <label>______</label>
                                           <button type="submit" class="btn btn-info btn-fill">Go</button>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="clearfix"></div>
                                  </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="ti-plus"></i> Visit By Doctor</h4>
                            </div>                             
                            <div class="content">
                                <form action="{{ url ('visit_check') }}" method="POST" enctype="multipart/form-data" >
                                    {!! csrf_field() !!}
                                      <div class="row">
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <label>Doctor</label>
                                                <input list="doctor" required="true" name="doctor" class="form-control border-input">
                                                  <datalist id="doctor">
                                                      
                                                    @foreach ($user_role as $value)
                                                      <?php $user = App\User::where('id','=',$value->user_id)->first(); ?>
                                                    <option value="{{$user->name}}">
                                                    @endforeach
                                                        
                                                  </datalist>
                                              </div>
                                          </div>
                                          <div class="col-md-2">
                                              <div class="form-group">
                                                  <label>_</label>
                                           <button type="submit" class="btn btn-info btn-fill">Go</button>
                                              </div>
                                          </div>
                                    </div>
                                      </div>
                                      <div class="clearfix"></div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users Behavior</h4>
                                <p class="category">24 Hours performance</p>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2015 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-warning"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
$(document).ready(function(){

    demo.initChartist();

    $.notify({
        icon: 'ti-gift',
        message: "Welcome to <b>{{ config('app.name', 'Laravel') }}</b> - a beautiful system  for your clinic - by <b>obaaa</b>."

      },{
          type: 'success',
          timer: 3000
      });

});
</script>
@endsection

