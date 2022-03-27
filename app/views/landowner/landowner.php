<?php include 'top-container.php'; ?>
<?php include 'js/landowner/dashboardjs.php"'; ?>



<!-- Top dashboard home content -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/landowner.css">
<!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->

<body onload="lastMonthIncomeAndAdvance();getTeaQulity();fertilizerUsage();"></body>


<!-- middle grid -->

<div class="container">

  <!-- first four boxes -->
  <div class="box-one">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Last Month Income</div>
        <div class="number" id="income">
        </div>
        <div class="indicator">
          <i class='bx bx-up-arrow-alt'></i>
          <span class="text">Last month</span>
        </div>
      </div>
      <i class='bx bxs-cart-add cart one'></i>
    </div>
  </div>

  <div class="box-two">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Last Month Fertilizer Usage</div>
        <div class="number" id="totMass"></div>
        <div class="indicator">
          <i class='bx bx-up-arrow-alt'></i>
          <span class="text">Last month</span>
        </div>
      </div>
      <i class='bx bxs-cart-add cart two'></i>
    </div>
  </div>

  <div class="box-tree">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">This Month Advance</div>
        <div class="number" id="advance"></div>
        <div class="indicator">
          <i class='bx bx-up-arrow-alt'></i>
          <span class="text">This month</span>
        </div>
      </div>
      <i class='bx bx-cart cart three'></i>
    </div>
  </div>

  <div class="box-four">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">This Month Tea Rating</div>
        <div class="number" id="rating"></div>
        <div class="indicator">
          <i class='bx bx-down-arrow-alt down'></i>
          <span class="text">From five stars</span>
        </div>
      </div>
      <i class='bx bxs-cart-download cart four'></i>
    </div>
  </div>

  <!-- chart hedding -->

  <div class="chart-head">
    <h1>TEA SUPPLY DURING LAST 7 DAYS</h1>
  </div>

  <!-- chart -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <div class="chart">
    <div class="chartplace">
      <canvas id="myChart1" style="width:100%;max-width:1000px"></canvas>
    </div>
    <script>
      var xValues = ["<?php echo $data[0]['date']; ?>", "<?php echo $data[1]['date']; ?>", "<?php echo $data[2]['date']; ?>", "<?php echo $data[3]['date']; ?>", "<?php echo $data[4]['date']; ?>", "<?php echo $data[5]['date']; ?>", "<?php echo $data[6]['date']; ?>"];
      var yValues = [<?php echo $data[0]['net_weight']; ?>, <?php echo $data[1]['net_weight']; ?>, <?php echo $data[2]['net_weight']; ?>, <?php echo $data[3]['net_weight']; ?>, <?php echo $data[4]['net_weight']; ?>, <?php echo $data[5]['net_weight']; ?>, <?php echo $data[6]['net_weight']; ?>];
      var barColors = ['rgba(255, 99, 132, 0.8)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ];
      var borderColor = [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ];
      var graphName;
      for (var i = 1; i <= 3; i++) {
        switch (i) {
          case 1:
            graphName = "Weight"
            break

        }
        var chartNum = "myChart" + i
        new Chart(chartNum, {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues,
              borderWidth: 2,
            }]
          },
          options: {
            legend: {
              display: false
            },
            title: {
              display: true,
              text: graphName
            }
          }
        });
      }
    </script>
  </div>
</div>
<?php include 'js/landowner/dashboardjs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>