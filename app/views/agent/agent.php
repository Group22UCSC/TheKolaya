<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/agent.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/dashboard.css">
  <script src="<?php echo URL ?>vendors/js/agent/dashboard.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'topContainer.php'; ?>
  <div id="overlay"></div>
  <div class="topic">
    <h3>My Dashboard</h3>
  </div>
  <div class="notice">
    <?php
    if ($data != 0) {
      $x = count($data);
    } else {
      $x = "0";
    }
    ?>
    <div class="avanot"><?php echo $x ?> landowners to collect <br>tea leaves!</div>
    <?php $y = 4 ?>
    <div class="delnot"><?php echo $y ?> landowners to deliver <br>requests!</div>

  </div>
  <div class="availablelist">

    <div class="availabletopic">Available Landowner List </div>
    <div style="overflow:auto;">
      <table class="availabletable" id="availabletable">
        <tr>
          <td class="th">Landowner ID</td>
          <td class="th">Container Estimation</td>
          <!--<th>Address</th>    -->
        </tr>
        <?php

        for ($i = 0; $i < $x; $i++) {
          echo '<tr id="tea" data-href-tea="">
                    <td>' . $data[$i]['user_id'] . '</td>
                    <td>' . $data[$i]['no_of_estimated_containers'] . '</td>
                    
                </tr>';
        }
        ?>
      </table>
    </div>


    <!-- <div class="deliverylist">
  
    <h3 class="deliverytopic">Request  Delivery  List </h3>
    <table class="deliverytable" id="deliverytable">
    <tr>
        <th>Landowner ID</th>
        <th>Request ID</th>
        <th>Type</th>
        <th>Amount</th>            
      </tr> -->


    <!-- </table>
      </div> -->
  </div>
  <div class="forms">
    <?php include 'teaCollection.php'; ?>
  </div>
  <?php include 'popup.php'; ?>
  <?php include 'bottomContainer.php' ?>


  <script>
    var table = document.getElementById('availabletable');

    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function() {
        //rIndex = this.rowIndex;
        document.getElementById("lid").value = this.cells[0].innerHTML;
      };
    }
  </script>