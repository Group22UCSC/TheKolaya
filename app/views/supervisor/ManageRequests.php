<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/manageRequests.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Manage Request</h2>
  </div>
  <!-- .middle-container .request-table .get-id .table-element -->
  <div class="middle-container">
    <div class="request-table">
      <div class="table-wrapper">
        <div class="table_header">Fertilizer Request</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Date</div>
            <div class="cell">Landowner ID</div>
            <div class="cell">Name</div>
            <div class="cell">Amount(kg)</div>
          </div>
          <?php

          // for ($i = 0; $i < count($data); $i++) {
          //   echo '<div class="row table_row">
          //           <div class="cell" data-title="Request_date">' . $data[$i]['request_date'] . '</div>
          //           <div class="cell lid" data-title="Landowner_id">' . $data[$i]['lid'] . '</div>
          //           <div class="cell" data-title="Name">' . $data[$i]['name'] . '</div>
          //           <div class="cell" data-title="Amount">' . $data[$i]['amount'] . '</div>
          //         </div>';
          // }
          for ($i = 0; $i < 3; $i++) {
            $name = ($i == 0) ? 'Kamal perera' : 'Nuwangi weerasekara';
            if($i == 2) $name = "Sandaru gamage";
            echo '<div class="row">
		<div class="cell" data-title="Request_date">' . date("Y-m-d") . '</div>
                    <div class="cell lid" data-title="Landowener_id">LAN-01' . $i . '</div>
                    <div class="cell" data-title="Name">' . $name . '</div>
                    <div class="cell" data-title="Amount">5' . $i . '</div>
                  </div>';
          }
          ?>
        </div>
      </div>

    </div>

    <div class="from-container-outside">
      <div class="form-container">
        <div class="title">Request Confirmation Form</div>
        <form action="#">
          <div class="form">
            <div class="inputfield">
              <label>Landowner ID</label>
              <input type="text" class="input" id="landowner-id">
            </div>
            <div class="inputfield">
              <label>Comment</label>
              <textarea class="textarea"></textarea>
            </div>
            <div class="inputfield">
              <input type="submit" value="Accept" class="accept-btn" name="accept-btn">
            </div>
            <div class="inputfield">
              <input type="submit" value="Decline" class="decline-btn" name="decline-btn">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="Landowner-details">
      <div class="table-wrapper">
        <div class="table_header">Previous Fertilizer Request</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Previous Request Date</div>
            <div class="cell">Monthly Tea Amount(kg)</div>
          </div>
          <?php
          for ($i = 0; $i < 2; $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Tea_weight">2021-08-1'.$i.'</div>
                    <div class="cell" data-title="Agent_id">50' . $i . '</div>
                  </div>';
          }
          ?>
        </div>
      </div>
    </div>
    <div class="landowner-rate-outside">
      <div class="landowner-rate">
        <h2 style="color: #4DD101; text-align:center; margin-bottom:10px;">Pasindu's Tea Quality</h2>
        <div class="rating-row">
          <div class="side">
            <div>5 stars</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-5"></div>
            </div>
          </div>
          <div class="side right">
            <div>150</div>
          </div>
          <div class="side">
            <div>4 stars</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-4"></div>
            </div>
          </div>
          <div class="side right">
            <div>63</div>
          </div>
          <div class="side">
            <div>3 stars</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-3"></div>
            </div>
          </div>
          <div class="side right">
            <div>15</div>
          </div>
          <div class="side">
            <div>2 stars</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-2"></div>
            </div>
          </div>
          <div class="side right">
            <div>6</div>
          </div>
          <div class="side">
            <div>1 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-1"></div>
            </div>
          </div>
          <div class="side right">
            <div>20</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'script-included.php' ?>
  <?php include 'js/supervisor/table2-js.php' ?>
  <?php include 'bottom-container.php'; ?>