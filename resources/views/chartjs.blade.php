

@extends('backend.layout.admindesign')

@section('title')
<title>chart</title>
@endsection


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<div class="col-6">

<canvas id="myChart" style="width:100%;max-width:1200px"></canvas>

<script>
var xValues = ["January", "February", "March ", "April", "May"];
var yValues = [55, 49, 44, 24, 20];
var barColors = ["red", "green","blue","orange","black"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Number of Visitors"
    }
  }
});
</script>

</div>
<div
id="myChart" style="width:100%; max-width:00px; height:1000px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['Italy',54.8],
  ['France',48.6],
  ['Spain',44.4],
  ['USA',23.9],
  ['Argentina',14.5]
]);

const options = {
  title:'World Wide Wine Production'
};

const chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@endsection
