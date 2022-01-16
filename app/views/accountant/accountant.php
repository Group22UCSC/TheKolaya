<?php include 'top-container.php'; ?>
<!-- Top dashboard home content -->
<body onload="AuctionIncome30();totSales30();"></body>
<div class="home-content">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_type'] ?>-style.css">
  <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
  
  <!-- toop button container -->
  <div class="home-content">
    <div class="overview-boxes">
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Income(Rs)</div>
          <div class="number"> <p id="auctionDash"></p></div>
          <!-- <input type="text" class="number" > -->
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart one'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Expenses(Rs)</div>
          <div class="number"><p id="auctionExpenses"></p></div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart two'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Profit(Rs)</div>
          <div class="number"><p id="totProfit"></p></div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bx-cart cart three'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Sales(Kg)</div>
          <div class="number"><p id="totSales"></p></div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bxs-cart-download cart four'></i>
      </div>
    </div>
  </div>

  <!-- <?php print_r($data); ?> -->



  <!-- Graphs -->
  <!-- **********  Bar chart and pie chart Section ********* -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <div class="barChartSection">

    <div class="barchar1">
      <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

      <script>
        var xValues = ["January", "February", "March", "April", "May"];
        var yValues = [4500, 4900, 3400, 2400, 2500];
        var barColors = ["#2BD47D", "#ffc233", "#e05260", "#66b0ff"];

        new Chart("myChart1", {
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
              text: "Income to the factory in Rs   "
            }
          }
        });
      </script>

    </div>
    <!-- ********* Rating Section ********* -->
    <div class="ratingSection">
      <!-- <p> Tea Quality Rating</p> -->

      <canvas id="myChart2" style="width:100%;max-width:300px"></canvas>

      <script>
        var xValues = ["Income","Expences"];
        var yValues = [60,30];
        var barColors = ["#2BD47D", "#ffc233"];
  
        new Chart("myChart2", {
          type: "doughnut",
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
              text: "Tea Quality Rating"
            }
          }
        });
      </script>
    </div>
    <div class="list">
        <ul>
            <li>Best Quality</li>
            <li>Good Quality</li>
            <li>Average Quality</li>
            <li>Poor Quality</li>
        </ul>
        </div>
  </div>
  <!-- bar chart 2 -->
<?php include 'js/accountant/dashboardjs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>