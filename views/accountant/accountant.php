<?php include 'top-container.php'; ?>
<!-- Top dashboard home content -->
<div class="home-content">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/<?php echo $_SESSION['user_type']?>/<?php echo $_SESSION['user_type']?>-style.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/<?php echo $_SESSION['user_type']?>/<?php echo $_SESSION['user_type']?>-queries.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<!-- toop button container -->
<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart one' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">38,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">$12,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>
</div>
<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="barchart1">

    <canvas id="myChart" style="width:100%;max-width:300px"></canvas>

    <script>
        var xValues = ["Italy", "France", "Spain", "USA"];
        var yValues = [24, 49, 44, 55];
        var barColors = ["#2BD47D", "#ffc233", "#e05260", "#66b0ff"];

        new Chart("myChart", {
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
                    text: "World Wine Production 2018"
                }
            }
        });
    </script>
</div>
<!-- bar chart 2 -->

<?php include 'bottom-container.php'; ?>