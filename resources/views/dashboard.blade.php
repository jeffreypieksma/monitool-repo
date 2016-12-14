@extends('layouts.dashboard')
@section('content')
<!-- <script>
  var myChart = new Chart({...})
</script> -->
<div class="dashboard">
  <div class="container-fluid">

    <section>

      <div class="row">
        <div class="panel filterbuttons">
            <div class="buttons-filter buttons-bar"></div>
            <div class="buttons-filter" id="mainfilter"></div>       
        </div>
      </div>
    </section>

    <section>
      <div class="row">
        <!-- Graph and filter -->
        <div class="panel filterwrapper">
          <form id="filterform" ">        
            <div class="col-xs-4">
              <span class="panel-title">Facebook</span>
               <div class="form-group">
                  <div class="funkyradio">
                    <div class="funkyradio-primary">
                      <input name="facebook" id="radio1" type="radio" value="1"/>
                      <label for="radio1">Views</label>
                    </div>
                    <div class="funkyradio-primary">
                      <input name="facebook" id="radio2" checked="" type="radio" value="2"/>
                      <label for="radio2">Likes</label>
                    </div>
                    <div class="funkyradio-primary">
                      <input name="facebook" id="radio3" checked="" type="radio" value="3" />
                      <label for="radio3">Shares</label>
                    </div>
                  </div>
                </div> 
            </div>

            <div class="col-xs-4">
              <span class="panel-title">YouTube</span>
              <div class="form-group">
                 <div class="funkyradio">
                    <div class="funkyradio-primary">
                      <input name="youtube" id="radio4" type="radio" value="1"/>
                      <label for="radio4">Views</label>
                    </div>
                    <div class="funkyradio-primary">
                      <input name="youtube" id="radio5" checked="" type="radio" value="2"/>
                      <label for="radio5">Likes</label>
                    </div>
                    <div class="funkyradio-primary">
                      <input name="youtube" id="radio6" checked="" type="radio" value="3"/ >
                      <label for="radio6">Shares</label>
                    </div>
                  </div>

              </div> 
            </div>
            <div class="col-xs-4">
{{--               <div class="filtericons">
                <div class="buttons-filter buttons-bar"></div>
                <div class="buttons-filter" id="mainfilter"></div>  
              </div> --}}
              <span class="panel-title">Services</span>
              <div class="funkyradio">
                    <div class="funkyradio-primary">
                      <input name="service1" id="checkbox1" type="checkbox" value="1"/>
                      <label for="checkbox1">Facebook</label>
                    </div>
                    <div class="funkyradio-primary">
                      <input name="service2" id="checkbox2" checked="" type="checkbox" value="1"/>
                      <label for="checkbox2">YouTube</label>
                    </div>
                  </div>
              
                <button class="btn btn-primary" type="button" id="formbutton">Submit filter</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <section>
      <div class="row">
        <div class="col-md-12">
          <div class="panel graph graphwrapper">
            <p class="panel-title text-left">Facebook & Youtube - Views</p>
            <div id="chartdiv"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- More details -->
    <section>
      <div class="row dashboard-bottom-half">
        <div class="col-md-4">
          <div class="panel">
            <p class="panel-title">Overall</p>

          </div>
        </div>
        <div class="col-md-4">
          <div class="panel">
            <p class="panel-title">Facebook</p>

          </div>
        </div>
        <div class="col-md-4">
          <div class="panel">
            <p class="panel-title">Youtube</p>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>
<?php
  $fbDataArray = [];

  foreach($data[0]['values'] as $value){
     $fbdate = strtotime($value["end_time"]);
     $date = date('D M d Y h:i:s OT (e)', $fbdate);
     $fbDataArray[] = array('date' => $date, 'visits' => $value["value"]);
  }

   $chartData = json_encode($fbDataArray);

  //dd($fbDataArray);
?>
<script type="text/javascript">
  var chartData = <?php echo $chartData; ?>
</script>
<script src="./resources/assets/js/chart-dashboard.js"></script>
@endsection

@section('scripts')

  <script src="./resources/assets/js/chart-dashboard.js"></script>
  <script src="./resources/assets/js/Chart.js"></script>

  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
  
@endsection

@section('style')

    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

@endsection