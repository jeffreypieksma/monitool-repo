@extends('layouts.dashboardcards')
@section('content')
<!-- <script>
  var myChart = new Chart({...})
</script> -->
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