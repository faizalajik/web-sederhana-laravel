@extends('layouts.app')

@section('content')
<div class="container">

</nav>
<div class="row justify-content-center">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript">  
      google.charts.load("current", {packages:["bar"]});
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);  
      function drawChart()  
      {  
        var data = google.visualization.arrayToDataTable([  
          ['Mahasiswa','Perempuan','Laki-Laki'],  
          ['Lulus',<?php echo $data['Lulus']['perempuan']; ?>,<?php echo $data['Lulus']['laki']; ?>],
          ['Belum Lulus',<?php echo $data['Belum Lulus']['perempuan']; ?>,<?php echo $data['Belum Lulus']['laki']; ?>],
          ['DO',<?php echo $data['DO']['perempuan'];?>,<?php echo $data['DO']['laki'];?>]
          ]);
        var data2 = google.visualization.arrayToDataTable([  
          ['Mahasiswa','Informatika'],  
          ['Lulus',<?php echo $data['Lulus']['informatika']; ?>],
          ['Belum Lulus',<?php echo $data['Belum Lulus']['informatika']; ?>],
          ['DO',<?php echo $data['DO']['informatika']; ?>]
          ]);   
        var options = {  
          title: 'Persentase Status Mahasiswa Semua Jurusan',
          colors: ['red','blue','silver'], 
          vAxis: {format: 'decimal'}
      };  
      var options2 = {  
          title: 'Persentase Status Mahasiswa Jurusan Informatika',
          colors: ['green','orange','silver'], 
          vAxis: {format: 'decimal'}
      };  
      var chart2 = new google.charts.Bar(document.getElementById('chart_div2'));
      chart2.draw(data, google.charts.Bar.convertOptions(options));  
      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data2, options2);
  }  
</script> 
<table>
  <tr> 
      <td></td>               
      <td>
        <div id="chart_div2" style="margin-left: 10px;width: 475px; height: 400px;margin-top: 20px;"></div>
    </td>
    <td>
        <div id="piechart_3d" style="margin-left: 100px;width: 475px; height: 400px;margin-top: 20px;"></div>
    </td>
</tr>
<tr>

</tr>
</table>
<div> 

</div> 
</div>
</div>
@endsection
