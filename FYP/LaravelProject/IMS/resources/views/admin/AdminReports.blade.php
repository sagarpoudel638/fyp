@extends('MasterAdmin')
@section('container')

<div style="display:inline">
    <h2>Reports</h2>
    <div style="display:flex; height:max;  margin-bottom:20%;margin-left:40%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:max">
        <div id="piechart" style="width:900px; height:600px;">

        </div>
    </div>



        <div style="display:flex; height:50px;  margin-bottom:20%;margin-left:40%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:50px">
        </div>


        <div style="display:flex; height:50px;  margin-bottom:20%;margin-left:40%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:50px">
        </div>



        <div style="display:flex; height:50px;  margin-bottom:20%;margin-left:40%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:50px">
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
          title: 'Student Report'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

@endsection
