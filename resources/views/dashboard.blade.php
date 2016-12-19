@extends('layouts.dashboard')
@section('content')

<div class="dashboard">
  <div class="container-fluid">
    <div class="row dashboard-top-half">
      <div class="col-md-12">
        <div class="panel graph">
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
                <canvas id="OverallDoughnutChart" width="200" height="200"></canvas>
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
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var chartData = <?php echo $data['insights']; ?>
</script>
<script src="./resources/assets/js/chart-dashboard.js"></script>
<?php

  // dd($data);

?>
@endsection