<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php'?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/supervisor-style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Supervisor</h2>
  </div>
  <div class="middle-container">
    <div class="graph-container">
      <div class="left-div div">
        <div class="dark green"></div> <span>Fertilizer Stock</span>
      </div>
      <div class="right-div div">
        <div class="light green"></div> <span>Firewood Stock</span>
      </div>
      <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/supervisor/dashboard-chart.php' ?>
      <div class="table-row">
        <!-- <div class="fertilizer-btn"><a href="<?php echo URL ?>Supervisor/fertilizerStock"><button class="table-btn">fertilizer Stock</button></a></div>
          <div class="firewood-btn"><a href="<?php echo URL ?>Supervisor/firewoodStock"><button class="table-btn">firewood stock</button></a></div> -->
      </div>
    </div>

    <div class="agent-tea-table">
      <div class="table-wrapper">
        <div class="table_header">Users</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Tea Weight(kg)</div>
            <div class="cell">Agent ID</div>
          </div>
          <?php
          for ($i = 0; $i < 10; $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">LAN-00' . $i . '</div>
                    <div class="cell" data-title="Tea_weight">5' . $i . '</div>
                    <div class="cell" data-title="Agent_id">AGN-00' . $i . '</div>
                  </div>';
          }
          ?>
        </div>
      </div>

    </div>
    <div class="request-table">
      <div class="table-wrapper">
        <div class="table_header">Today Fertilizer Requests</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Name</div>
            <div class="cell">Reqeust Amount</div>
          </div>
          <?php
          for ($i = 0; $i < 2; $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">LAN-00' . $i . '</div>
                    <div class="cell" data-title="Tea_weight">5' . $i . '</div>
                    <div class="cell" data-title="Agent_id">AGN-00' . $i . '</div>
                  </div>';
          }
          ?>
        </div>
      </div>

      <div class="table-row">
        <a href="<?php echo URL ?>Supervisor/manageRequests"><button class="table-btn">Go to confirm</button></a>
      </div>
    </div>
  </div>
  <?php include 'bottom-container.php'; ?>