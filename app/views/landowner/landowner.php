<?php include 'top-container.php'; ?>
<!-- Top dashboard home content -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/landowner.css">

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<div class="container">


  <div class="box-one">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Last Month Income</div>
        <div class="number">40,876</div>
        <div class="indicator">
          <i class='bx bx-up-arrow-alt'></i>
          <span class="text">Up from previous month</span>
        </div>
      </div>
      <i class='bx bxs-cart-add cart one'></i>
    </div>
  </div>
  <div class="box-two">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Last Month Fertilizer Usage</div>
        <div class="number">100kg</div>
        <div class="indicator">
          <i class='bx bx-up-arrow-alt'></i>
          <span class="text">Up from previous month</span>
        </div>
      </div>
      <i class='bx bxs-cart-add cart two'></i>
    </div>
  </div>
  <div class="box-tree">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">This Month Advance</div>
        <div class="number">2,876</div>
        <div class="indicator">
          <i class='bx bx-up-arrow-alt'></i>
          <span class="text">Up from yesterday</span>
        </div>
      </div>
      <i class='bx bx-cart cart three'></i>
    </div>
  </div>
  <div class="box-four">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Your Tea Rating</div>
        <div class="number">4.9</div>
        <div class="indicator">
          <i class='bx bx-down-arrow-alt down'></i>
          <span class="text">Down from
            Previous month</span>
        </div>
      </div>
      <i class='bx bxs-cart-download cart four'></i>
    </div>
  </div>
  <div class="chart-head">
    <h1>TEA SUPPLY DURING LAST WEEK</h1>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <div class="chart">
    <div class="chartplace">
      <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
    </div>
    <script>
      var xValues = ["Monday", "Tuesday,", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
      var yValues = [50, 25, 35, 44, 37, 80, 77];
      var barColors = ["rgb(80, 200, 120)", "rgb(53, 83, 10)", "rgb(161, 242, 31)", "rgb(255, 213, 128)", "rgb(0, 57, 128)", "rgb(5, 17, 87)", "rgb(255, 140, 0)"];
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
              data: yValues
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

<?php include 'bottom-container.php'; ?>