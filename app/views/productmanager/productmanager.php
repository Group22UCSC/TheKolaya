<?php include 'top-container.php'; ?>
<!-- Top dashboard home content -->
<body onload="AuctionIncome30();totSales30();"></body>
<div class="home-content">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_type'] ?>-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_type'] ?>-queries.css">
   
  <!-- toop button container -->
  <div class="home-content">
    <div class="overview-boxes">
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Auction Income (Rs)</div>
          <div class="number"> <p id="auctionDash"></p></div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart one'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Tea Stock(Kg)</div>
          <div class="number">38,876</div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart two'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Sold Tea Stock(Kg)</div>
          <div class="number"><p id="soldtea30"</div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bx-cart cart three'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Most Beneficial Product</div>
          <div class="number">Green Tea</div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last 30 Days</span>
          </div>
        </div>
        <i class='bx bxs-cart-download cart four'></i>
      </div>
    </div>
  </div>
  <!-- Graphs -->
  <!-- **********  Bar chart and pie chart Section ********* -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <div class="barChartSection">

    <div class="barchar1">
      <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

      <script>
        var xValues = ["January", "February", "March", "April", "May", "June"];
        var yValues = [4500, 4900, 3400, 2400, 4500, 4200];
        var barColors = ["#2BD47D", "#ffc233", "#e05260", "#66b0ff", "#3a5ec0"];

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
              text: "Monthly Auction Income(Rs)"
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
        var xValues = ["Green Tea", "Black Tea", "N Black Tea", "Matcha Tea"];
        var yValues = [60000, 20000, 10500, 10100];
        var barColors = ["#2BD47D", "#ffc233", "#e05260"];

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
              text: "Sales from the last auction(Kg)"
            }
          }
        });
      </script>
    </div>

  </div>
  <!-- bar chart 2 -->



<?php include 'js/productmanager/dashboardjs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>