<?php include 'top-container.php'; ?>
<!-- Top dashboard home content -->
<body onload="AuctionIncome30();totSales30();totTeaStockNow();"></body>
<div class="home-content">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_type'] ?>-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_type'] ?>-queries.css">
   
  <?php 

print_r($data);
// print_r($data);
$today = date("Y-m-d");
$len = sizeof($data);


// $month=date("m");
// $date = $data[0]['date'];
// echo date('F, Y');
$month06start = date('m', strtotime("0 month"));  // this month
$month05start = date('m', strtotime("-1 month"));  //  prev month
$month04start = date('m', strtotime("-2 month")); // 2 onths ago
$month03start = date('m', strtotime("-3 month")); // 3months ago
$month02start = date('m', strtotime("-4 month")); // 4 months ago
$month01start = date('m', strtotime("-5 month")); // 5 months ago

// echo $month06start;
$tea = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'); // array to store tea net weights of each month
// (int)$tea[11]=(int)$tea[11]+5;
// echo (int)$tea[11];
// echo $len;
$tea6 = 0.0; // this month tea quantity
$tea5 = 0.0; // previous month tea quantity
$tea4 = 0.0; // 2 months ago tea quantity
$tea3 = 0.0;
$tea2 = 0.0;
$tea1 = 0.0;

// tea quality variables
$starts5 = 0;
$starts4 = 0;
$starts3 = 0;
$starts2 = 0;
$starts1 = 0;
for ($i = 0; $i < $len; $i++) {

  $dateTest = $data[$i]['date']; //get the date of which the net weight was added
  $dateTest2 = date('Y-m-d', strtotime($dateTest));
  $month = date('m', strtotime($dateTest2));
  // echo $month;
  // (int)$tea[$month] += (int)$data[$i]['net_weight'];
  if ($month == $month06start) {  // if date is this month's date
    $tea6 += (float)$data[$i]['sold_price'] * (float)$data[$i]['sold_amount'];
  } else if ($month == $month05start) { // if date is previous month's date
    $tea5 += (float)$data[$i]['sold_price'] * (float)$data[$i]['sold_amount'];
  } else if ($month == $month04start) {
    $tea4 += (float)$data[$i]['sold_price'] * (float)$data[$i]['sold_amount'];
  } else if ($month == $month03start) {
    $tea3 += (float)$data[$i]['sold_price'] * (float)$data[$i]['sold_amount'];
  } else if ($month == $month02start) {
    $tea2 += (float)$data[$i]['sold_price'] * (float)$data[$i]['sold_amount'];
  } else if ($month == $month01start) {
    $tea1 += (float)$data[$i]['sold_price'] * (float)$data[$i]['sold_amount'];
  } else {
  }

}

?>


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
          <div class="number"><p id="totTeaStock"></p></div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Available Now</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart two'></i>
      </div>
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Sold Tea Stock(Kg)</div>
          <div class="number"><p id="soldtea30"></p></div>
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
        val06 = '<?php echo $tea6; ?>'; // get the valu from php to js
        val05 = '<?php echo $tea5; ?>';
        val04 = '<?php echo $tea4; ?>';
        val03 = '<?php echo $tea3; ?>';
        val02 = '<?php echo $tea2; ?>';
        val01 = '<?php echo $tea1; ?>';
        var m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var last_n_months = []
        var d = new Date()
        for (var i = 5; i >= 0; i--) {
          last_n_months[i] = m[d.getMonth()]
          d.setMonth(d.getMonth() - 1)
        }
        var xValues = last_n_months;
        var yValues = [val01, val02, val03, val04, val05, val06];
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