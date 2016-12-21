@extends('layouts.dashboard')
@section('content')

<div class="dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel graph fixed-height">
          <p id="graph_title" class="panel-title text-left"></p>
          <div class="buttons-filter buttons-bar"></div>
            <div class="buttons-filter mainfilter"></div>
            <!-- <div class="graphwrapper">
              <div id="chartdiv"></div>
            </div> -->
            <div class="cardwrapper row">
              @foreach($data['feed']['data'] as $post)
              <div class="col-md-2">
                <div class="cardpanel .btn-default">
                  <p class="card-title">{{$post['date']}} {{$post['id']}}</p>
                  <div class="cardpicture">
                      <img src="{{$post['picture']}}">
                  </div>
                  <div class="cardtext">
                      <span class="more">{{$post['message']}}</span>
                  </div>
                  <div class = "cardstats"
                      <p> <img src="public/img/ic_thumb_up_black_18dp_1x.png"> {{$post['likes']}}
                      <img src="public/img/ic_share_black_18dp_2x.png"> {{$post['shares']}} 
                      <img src="public/img/ic_message_18dp.png"> {{$post['comments']}} </p>
                  </div>
                </div>
              </div>
              @endforeach
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
                  <button class="btn btn-primary" type="button" id="formbutton">Filter</button>
                </div> 
            </div>

            <div class="col-xs-4">
              <!-- <span class="panel-subtitle">YouTube</span>
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

              </div>  -->
            </div>
            <div class="col-xs-4">
              <!-- <span class="panel-subtitle">Services</span>
              <div class="funkyradio">
                    <div class="funkyradio-primary">
                      <input name="service1" id="checkbox1" type="checkbox" value="1"/>
                      <label for="checkbox1">Facebook</label>
                    </div>
                    <div class="funkyradio-primary">
                      <input name="service2" id="checkbox2" checked="" type="checkbox" value="1"/>
                      <label for="checkbox2">YouTube</label>
                    </div>
                  </div> -->
            </div>
          </form>
        </section>
      </div>   
    <div class="row graph">
        <div class="col-md-6">
            <div class="panel">
                <p class="panel-title">Overall</p>
                <div class="OverallChartContainerTop">
                    <div class="OverallChartContainerLeft">
                        <canvas id="OverallDoughnutChartLocation" width="100" height="100"></canvas>
                    </div>
                    <div class="OverallChartContainerRight">
                        <canvas id="OverallDoughnutChartAge" width="100" height="100"></canvas>
                    </div>
                </div>
                <div class="OverallChartContainerBottom">
                    <canvas id="OverallLineChart" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <p class="panel-title">Facebook</p>
                <div class="OverallChartContainerTop">
                    <div class="OverallChartContainerLeft">
                        <canvas id="FacebooklDoughnutChartLocation" width="100" height="100"></canvas>
                    </div>
                    <div class="OverallChartContainerRight">
                        <canvas id="FacebooklDoughnutChartAge" width="100" height="100"></canvas>
                    </div>
                </div>
                <div class="OverallChartContainerBottom">
                    <canvas id="FacebooklLineChart" width="100" height="25"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
</div>

<script src="./resources/assets/js/chart-dashboard.js"></script>
<script type="text/javascript">
   var chartData = <?php echo $data['insights']; ?>;
   var graphTitle = document.getElementById("graph_title");
   graphTitle.innerHTML = "Facebook - Impressions";
   dashboardMakeChart(chartData);
  
  function displayFilter(filtervalue){
      if(filtervalue != null){
        switch(filtervalue[0]) {
          case 1:
            console.log("Views");   
            var chartData = <?php echo $data['insights']; ?>;
            graphTitle.innerHTML = "Facebook - Impressions";
            dashboardMakeChart(chartData);
            break;
          case 2:
            console.log("Likes");
            var chartData = <?php echo $data['likes']; ?>;
            graphTitle.innerHTML = "Facebook - Likes";
            dashboardMakeChart(chartData);
            break;
          case 3:
            console.log("Shares");
            break;        
        } 

    }
  }
</script>

@endsection