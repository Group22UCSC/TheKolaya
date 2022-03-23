<?php include 'top-container.php';?>
<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/manager-style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div class="main">
       <div class="title-container">
    <h2>Fertilier and Firewood Stock details</h2>
  </div>
 <!--  <div class="middle-container"> -->
    <div class="graph-container">

      <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/manager/dashboard-chart.php' ?>
    </div>




    <div class="title-container2">
    <h2>Product Stock details</h2>
  </div>
 <!--  <div class="middle-container"> -->
    <div class="graph-container2">

      <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/manager/dashboard-chart2.php' ?>
    </div>


</div>
 
<?php include 'bottom-container.php';?>
