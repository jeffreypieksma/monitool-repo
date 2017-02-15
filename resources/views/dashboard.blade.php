@extends('layouts.dashboard')
@section('content')
<script src="./resources/assets/js/chart-dashboard.js"></script>
<div class="dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel headbar">
          <span class="project-title">{{ $data['project']->name }}</span>
          <a href="/monitool-repo/options" class="title-edit">
            <img src="public/icons/icon-edit.png" alt="" title="Edit story name">
          </a>
          <div id="cardsbutton" class="buttons-filter buttons-bar" title="Toggle cards view"></div>
          <div class="buttons-filter mainfilter" title="Toggle filters"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel graph fixed-height">
          <p id="graph_title" class="panel-title text-left"></p>
            <div class="graphwrapper">
              <div id="chartdiv"></div>
            </div>
            <div class="cardswrapper row">
              @foreach($data['feed']['data'] as $post)
                  <div class="cardpanel .btn-default">
                    <div class="card-title">
                      <p>{{$post['date']}}</p>
                      <a href="{{$post['link']}}">
                        <abbr title="Link to post">
                          <img src="public/icons/icon-link.png" alt="">
                        </abbr>
                      </a>
                    </div>
                    <div class="cardpicture">
                        <img src="{{$post['picture']}}">
                    </div>
                    <div class="cardtext">
                        <span class="more">{{$post['message']}}</span>
                    </div>
                    <div class = "cardstats"
                        <p> <img src="public/icons/icon-like.png"> {{$post['likes']}}
                        <img src="public/icons/icon-share.png"> {{$post['shares']}} 
                        <img src="public/icons/icon-comment.png"> {{$post['comments']}} </p>
                    </div>
                  </div>
                  <div class="arrow">
                    <img src="public/icons/arrow-2.png" alt="">
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
                    <!-- <div class="funkyradio-primary">
                      <input name="facebook" id="radio3" checked="" type="radio" value="3" />
                      <label for="radio3">Shares</label>
                    </div> -->
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
                    <div class="OverallChartContainerLeft subpanel">
                        <p class="subpanel-title">Reached people - Location</p>
                        <div>
                            <canvas id="OverallDoughnutChartLocation" width="100" height="100"></canvas>
                        </div>
                    </div>
                    <div class="OverallChartContainerRight subpanel">
                        <p class="subpanel-title">Reached people - Age</p>
                        <div>
                            <canvas id="OverallDoughnutChartAge" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="OverallChartContainerBottom">
                    <p class="subpanel-title">Reached people - Growth</p>
                    <div>
                        <canvas id="OverallLineChart" width="100" height="50"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <p class="panel-title">Facebook</p>
                <div class="OverallChartContainerTop">
                    <div class="OverallChartContainerLeft subpanel">
                        <p class="subpanel-title">Reached people - Location</p>
                        <div>
                            <canvas id="FacebookDoughnutChartLocation" width="100" height="100"></canvas>
                        </div>
                    </div>
                    <div class="OverallChartContainerRight subpanel">
                        <p class="subpanel-title">Reached people - Age</p>
                        <div>
                            <canvas id="FacebookDoughnutChartAge" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="OverallChartContainerBottom">
                    <p class="subpanel-title">Reached people - Growth</p>
                    <div>
                        <canvas id="FacebookLineChart" width="100" height="50"></canvas>
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
   graphTitle.innerHTML = "Facebook - Views";
   dashboardMakeChart(chartData);
  
  function displayFilter(filtervalue){
      if(filtervalue != null){
        switch(filtervalue[0]) {
          case 1:
            console.log("Views");   
            var chartData = <?php echo $data['insights']; ?>;
            graphTitle.innerHTML = "Facebook - Views";
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