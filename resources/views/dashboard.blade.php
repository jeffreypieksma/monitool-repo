@extends('layouts.dashboard')
@section('content')

<div class="dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel graph fixed-height">
          <p class="panel-title text-left">Facebook & Youtube - Views</p>
          <div class="buttons-filter buttons-bar"></div>
          <div class="buttons-filter"></div>
          <div id="chartdiv"></div>
          </div>
        </div>
      </div>
    
      <div class="row dashboard-bottom-half">
        <div class="col-md-4">
          <div class="panel">
            <p class="panel-title">Overall</p>
              <div class="OverallDoughnutChartContainer">
                <canvas id="OverallDoughnutChart" width="100" height="100"></canvav>
              </div>

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
            
          <section>
        <!-- Graph and filter -->
          <form id="filterform" class="filterwrapper">
            <div class="buttons-filter buttons-back mainfilter"></div>
            <div class="col-xs-4">
              <span class="panel-subtitle">Facebook</span>
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
              <span class="panel-subtitle">YouTube</span>
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
              <span class="panel-subtitle">Services</span>
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
        </section>
      </div>
    </div>
  </div>

</div>



<script type="text/javascript">

  var chartData = <?php echo $data['insights']; ?>

  <?php //dd($data['insights']);?>
</script>
<script src="./resources/assets/js/chart-dashboard.js"></script>
<?php

  // dd($data);

?>
@endsection