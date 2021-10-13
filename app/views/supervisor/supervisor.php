<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/supervisor-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/form-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/table-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Supervisor</h2>
    </div>
    <div class="middle-container">
      <div class="graph-container">
        <div class="left-div div"><div class="dark green"></div> <span>Fertilizer Stock</span></div>
        <div class="right-div div"><div class="light green"></div> <span>Firewood Stock</span></div>
      <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/supervisor/dashboard-chart.php'?>
        <div class="table-row">
          <!-- <div class="fertilizer-btn"><a href="<?php echo URL?>Supervisor/fertilizerStock"><button class="table-btn">fertilizer Stock</button></a></div>
          <div class="firewood-btn"><a href="<?php echo URL?>Supervisor/firewoodStock"><button class="table-btn">firewood stock</button></a></div> -->
        </div>
      </div>

      <div class="agent-tea-table">
      <div class="table-row"><div class="table-name"><b>Today Tea Collection</b></div></div>
        <div class="table-row table-head">
          <div class="table-element"><b>Landowner ID</b></div>
          <div class="table-element"><b>Agent ID</b></div>
          <div class="table-element"><b>Tea Weight(kg)</b></div>
        </div>
        <?php
          for($i = 0; $i < 10; $i++) {
            echo '<div class="table-row">
                    <div class="table-element">Lan-00'.$i.'</div>
                    <div class="table-element">Sasindu Wijegunasinghe</div>
                    <div class="table-element">50'.$i.'</div>
                  </div>';
          }
        ?>

      </div>
        <div class="request-table">
          <div class="table-row"><div class="table-name"><b>Today Requests</b></div></div>
          <div class="table-row table-head">
            <div class="table-element"><b>Landowner ID</b></div>
            <div class="table-element"><b>Name</b></div>
            <div class="table-element"><b>Amount(kg)</b></div>
          </div>
          <?php
            for($i = 0; $i < 2; $i++) {
              echo '<div class="table-row">
                      <div class="table-element">Lan-00'.$i.'</div>
                      <div class="table-element">Sasindu Wijegunasinghe</div>
                      <div class="table-element">50'.$i.'</div>
                    </div>';
            }
          ?>

          <div class="table-row">
            <a href="<?php echo URL?>Supervisor/manageRequests"><button class="table-btn">Go to confirm</button></a>
          </div>
        </div>
    </div>
<?php include 'bottom-container.php';?>



