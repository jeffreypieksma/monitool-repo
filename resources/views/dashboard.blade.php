@extends('layouts.dashboard')
@section('content')
<!-- <script>
  var myChart = new Chart({...})
</script> -->
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
      
//dd($data['feed']);

?>

        
    <div class="row dashboard-bottom-half">
      <div class="col-md-4">
        <div class="panel">
        <div class="post">
          <p class="panel-title">Overall</p>
          <div onclick="cardpicture">
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
<!--
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
//dd($data['feed']);

?>
@endsection
