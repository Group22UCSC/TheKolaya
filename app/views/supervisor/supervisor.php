<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/supervisor-style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Supervisor</h2>
  </div>
  <div class="middle-container">
    <div class="graph-container">
      <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/supervisor/dashboard-chart.php' ?>
    </div>
    <div class="agent-tea-table">
      <div class="table-wrapper">
        <div class="table_header">Today tea collection</div>
        <div class="table" id="today_collection_table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Tea Weight(kg)</div>
            <div class="cell">Agent ID</div>
          </div>
          <?php

          if (!empty($data1)) {
            for ($i = 0; $i < count($data1); $i++) {
              echo '<div class="row">
                      <div class="cell" data-title="Landowener_id">' . $data1[$i]['lid'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" data-title="Tea_weight">' . $data1[$i]['initial_weight_agent'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" data-title="Agent_id">' . $data1[$i]['agent_id'] . '</div>
                    </div>';
            }
          }
          ?>
        </div>
      </div>
      <?php
      if (empty($data1)) {
        echo '<div id="not_display_collection_yet" style="border-radius: 0px; color:red; background-color: white;" class="table_header" >There is no tea collection to update</div>';
      }
      ?>
    </div>

    <div class="request-table">
      <div class="table-wrapper" style="max-height:250px">
        <div class="table_header">Today Fertilizer Requests</div>
        <div class="table" id="today_request_table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Name</div>
            <div class="cell">Reqeust Amount</div>
          </div>
          <?php
          if (!empty($data2)) {
            for ($i = 0; $i < count($data2); $i++) {
              echo '<div class="row">
                    <div class="cell" data-title="Landowener ID">' . $data2[$i]['user_id'] . '</div>
                    <hr class="horizontal-line">
                    <div class="cell" data-title="Name">' . $data2[$i]['name'] . '</div>
                    <hr class="horizontal-line">
                    <div class="cell" data-title="Request Amount">' . $data2[$i]['amount'] . '</div>
                  </div>';
            }
          }
          ?>
        </div>
      </div>
      <?php
      if (empty($data2)) {
        echo '<div id="not_display_request_yet" style="border-radius: 0px; color:red; background-color: white;" class="table_header" >There is no Request to update</div>';
      }
      ?>
      <!-- <div style="padding: 10px;">
        <a style="margin-bottom: 10px;" href="<?php echo URL ?>Supervisor/manageRequests"><button class="table-btn">Go to confirm</button></a>
      </div> -->
    </div>

  </div>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#today_request_table").click(function(event) {
        if (!$(event.target.parentNode).hasClass("tabel-header")) {
          window.location.href = "<?php echo URL?>Supervisor/manageRequests";
        }
      });

      $("#today_collection_table").click(function(event) {
        if (!$(event.target.parentNode).hasClass("tabel-header")) {
          window.location.href = "<?php echo URL?>Supervisor/updateTeaMeasure";
        }
      });
    })
  </script>
  <?php include 'js/supervisor/supervisorJs.php' ?>
  <?php include 'bottom-container.php'; ?>