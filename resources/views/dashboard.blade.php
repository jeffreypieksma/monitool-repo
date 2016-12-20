@extends('layouts.dashboard')
@section('content')
<?php
  
  //dd($data);
  //dd($data['insights']);
  //dd($data['likes']);

?>
<div class="dashboard">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel graph fixed-height">
          <p id="graph_title" class="panel-title text-left"></p>
          <div class="buttons-filter buttons-bar"></div>
          <div class="buttons-filter"></div>
          <div id="chartdiv"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row dasboardcards">
      <div class="dashboardcard">
      </div>
          <p class="panel-title text-left">Verhaal kaarten</p>

          </div>
          </div>
            
         
<?php

 // dd($data['feed']['data']);
  
  foreach ($data['feed']['data'] as $key => $post) {
    //define
    $date = date('d-m-Y G:i:s', strtotime($post['created_time']));
    $picture = "";
    $message = "";
    $likes = "";
    // $views = "";
    $shares = "";
    $comments = "";

    //validate
    if(isset($post['picture'])){
      $picture = $post['picture'];
    }

    if(isset($post['message'])){
      $message = $post['message'];
    }

    if(isset($post['likes'])){
      $likes = $post['likes']['summary']['total_count'];
    }

    // if(isset($post['views'])){
    //   $views = $post['views'];
    // }

    if(isset($post['shares'])){
      $shares = $post['shares']['count'];
    }

    if(isset($post['comments'])){
      $comments = $post['comments']['summary']['total_count'];
    }

    //return
    $output = <<< EOT
    <div class="col-md-2">
        <div class="cardpanel .btn-default">
            <p class="card-title">$date</p>
            <div class="cardpicture">
                <img src="$picture">
            </div>
            <div class="cardtext"
                <p> $message </p>
                <p>click for more</p>
            </div>
            <div class = "cardstats-lsc"
                <p> <img src="public/img/ic_thumb_up_black_18dp_1x.png"> $likes 
                    <img src="public/img/ic_share_black_18dp_2x.png"> $shares 
                    <img src="public/img/ic_message_18dp.png"> $comments </p>
            </div>
        </div>
    </div>
EOT;
echo $output;
  }
?>

        
    <div class="row dashboard-bottom-half">
      <div class="col-md-4">
        <div class="panel">
        <div class="post">
          <p class="panel-title">Overall</p>
          <div onclick="cardpicture">
          </div>

            <div class="buttons-filter mainfilter"></div>
            <div class="graphwrapper">
              <div id="chartdiv"></div>
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

                <button class="btn btn-primary" type="button" id="formbutton">Filter</button>


            </div>
          </form>
        </section>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">

  var chartData = <?php echo $data['insights']; ?>
</script>
<script src="./resources/assets/js/chart-dashboard.js"></script>

<?php
foreach ($data['feed']['data'] as $post) {
  if (isset($post['message'])) {
    echo "<p class='post-message'>" . $post['message'] . "</p>";
  }
}
?>

<script src="./resources/assets/js/chart-dashboard.js"></script>
<script type="text/javascript">
  
  //var chartData ='';

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
