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
      <div class="left-div div">
        <div class="dark green"></div> <span>Fertilizer Stock</span>
      </div>
      <div class="right-div div">
        <div class="light green"></div> <span>Firewood Stock</span>
      </div>
      <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/supervisor/dashboard-chart.php' ?>
    </div>
    <?php
    if (!empty($data1)) {
      echo '<div class="agent-tea-table">

              <div class="table-wrapper">
                <div class="table_header">Today tea collection</div>
                <div class="table">
                  <div class="row tabel-header">
                    <div class="cell">Landowner ID</div>
                    <div class="cell">Tea Weight(kg)</div>
                    <div class="cell">Agent ID</div>
                  </div>';
            for ($i = 0; $i < count($data1); $i++) {
              echo '<div class="row">
                      <div class="cell" data-title="Landowener_id">' . $data1[$i]['lid'] . '</div>
                      <div class="cell" data-title="Tea_weight">' . $data1[$i]['initial_weight_agent'] . '</div>
                      <div class="cell" data-title="Agent_id">' . $data1[$i]['agent_id'] . '</div>
                    </div>';
            }
            echo '</div>
                </div>
            </div>';
    }
    if(!empty($data2)) {
      echo '<div class="request-table">
      <div class="table-wrapper">
        <div class="table_header">Today Fertilizer Requests</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Name</div>
            <div class="cell">Reqeust Amount</div>
          </div>';
          for ($i = 0; $i < count($data2); $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">' . $data2[$i]['user_id'] . '</div>
                    <div class="cell" data-title="Name">' . $data2[$i]['name'] . '</div>
                    <div class="cell" data-title="Amount">' . $data2[$i]['amount'] . '</div>
                  </div>';
          }
          echo '</div>
          </div>
          <div class="table-row">
            <a href="<?php echo URL ?>Supervisor/manageRequests"><button class="table-btn">Go to confirm</button></a>
          </div>
        </div>';
    }
    ?>
        
  </div>
  <script>
    $(document).ready(function() {
      $('.agent-tea-table').click(function(event) {
        console.log(event);
        $.ajax({
          url: '<?php echo URL ?>Supervisor',
          type: 'GET',
          dataType: "html",
          success: function(response) {
            $("#table-container").html(data);
          }
        });
      });
    });
  </script>
  <?php include 'bottom-container.php'; ?>