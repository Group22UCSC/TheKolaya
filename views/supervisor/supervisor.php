<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/supervisor-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="text">Dashboard</div>
    <div class="middle-container">
        <div class="graph-container">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        <?php include 'vendors/js/supervisor/dashboard-chart.php'?>
        </div>

        <div class="agent-tea-table">
        <div class="table-row"><div class="table-name">Today Tea Collection</div></div>
          <div class="table-row table-head">
            <div class="table-element">Landowner ID</div>
            <div class="table-element">Agent ID</div>
            <div class="table-element">Tea Weight(kg)</div>
          </div>
          <div class="table-row">
            <div class="table-element">Lan-001</div>
            <div class="table-element">Agent-000</div>
            <div class="table-element">50</div>
          </div>

        </div>
        <div class="request-tabel">
          <div class="table-row"><div class="table-name">Today Request</div></div>
          <div class="table-row table-head">
            <div class="table-element">Landowner ID</div>
            <div class="table-element">Name</div>
            <div class="table-element">Amount(Kg)</div>
          </div>
          <div class="table-row">
            <div class="table-element">Lan-000</div>
            <div class="table-element">Sasindu Wijegunasinghe</div>
            <div class="table-element">50</div>
          </div>

          <div class="table-row">
            <a href="<?php echo URL?>Supervisor/manageRequests"><button class="table-btn">Go to confirm</button></a>
          </div>
        </div>
    </div>
<?php include 'bottom-container.php';?>



