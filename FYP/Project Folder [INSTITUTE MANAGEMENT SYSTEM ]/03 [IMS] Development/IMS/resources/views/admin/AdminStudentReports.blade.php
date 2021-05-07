@extends('MasterAdmin')
@section('container')

<div style="display:inline">
    <h2>Student Report</h2>
    <div class="buttons" style="height:100px; margin-top:0px; margin-left:43%">

        <button href="{{route('StudentReportPrint')}}" class="btn effect01"style="height:60px; margin-top:0px"><span>Print Report</span></button>

    </div>

    <div style="display:flex; height:max;  margin-bottom:0%;margin-left:5%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:max">
        <div id="piechart" style="width:1200px; height:600px;">

        </div>

    </div>








</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    var analytics = <?php echo $Course; ?>

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(analytics
        );

        var options = {
          title: '',
          is3D: true,


        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>




    <script type="text/javascript"
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script  src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>


<script type="text/javascript">
$(document).ready(function(){
$('button.btn').printPage('');
});
</script>

@endsection
