<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/manageRequests.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/request-table.css">
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
    <div class="request-table hello" id="allRequest">
      <div class="table-wrapper" style="margin-top: 30px;">
        <div class="table_header">Fertilizer Request</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Date</div>
            <div class="cell">Landowner ID</div>
            <div class="cell">Name</div>
            <div class="cell">Amount(kg)</div>
          </div>
          <?php
          if (!empty($data)) {
            for ($i = 0; $i < count($data); $i++) {
              echo '<div class="row table_row" id="' . $data[$i]['request_id'] . '">
                      <div class="cell" data-title="Request_date">' . $data[$i]['request_date'] . '</div>
                      <div class="cell lid" data-title="Landowner_id">' . $data[$i]['lid'] . '</div>
                      <div class="cell" data-title="Name">' . $data[$i]['name'] . '</div>
                      <div class="cell" data-title="Amount">' . $data[$i]['amount'] . '</div>
                    </div>';
            }
          }
          ?>
        </div>
      </div>
      <?php
      if (empty($data)) {
        echo '<div id="not_display_request_yet" style="border-radius: 0px; color:red; background-color: white; margin-bottom:50px" class="table_header" >There is no Request to update</div>';
      }

      ?>


    </div>
    <div class="modal">
      <div class="modal-content">
        <span class="close-button">×</span>
        <div class="Landowner-details" style="margin-top:40px;">
          <div class="table-wrapper">
            <div class="table_header">Previous Fertilizer Request</div>
            <div class="table" id="lanowner_details_table">
              <!-- here replace the data comes form ajax -->
            </div>
          </div>
          <div class="modal-btn-container">
            <button class="landowner_tea_rate">Lanadowner's Tea Rate</button>
            <button class="confirm_form">Confirm Request</button>
          </div>
        </div>

        <div class="landowner-rate-outside" style="display: none; margin-top:40px;">
          <div class="landowner-rate" id="tea-rate">
            <!-- here replace the data comes form ajax -->
          </div>
          <div class="modal-btn-container">
            <button class="previous_requests">Previous Requests</button>
            <button class="confirm_form">Confirm Request</button>
          </div>
        </div>

        <div class="from-container-outside" style="display: none;">
          <div class="form-container">
            <div class="title">Request Confirmation Form</div>
            <form action="#" id="request_confirm_form">
              <div class="form">
                <div class="inputfield">
                  <label>Landowner ID</label>
                  <input type="text" class="input" id="landowner-id" name="landowner_id">
                </div>
                <div class="inputfield">
                  <label>Comment</label>
                  <textarea class="textarea" name="comment"></textarea>
                </div>
                <div class="inputfield">
                  <input type="submit" value="Accept" class="accept-btn confirmBtn" name="accept_btn" id="request_accept_btn">
                </div>
                <div class="inputfield">
                  <input type="submit" value="Decline" class="decline-btn confirmBtn" name="decline_btn" id="request_decline_btn">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-btn-container">
            <button class="previous_requests">Previous Requests</button>
            <button class="landowner_tea_rate">Lanadowner's Tea Rate</button>
          </div>

        </div>

      </div>
    </div>

  </div>
  <?php include 'script-included.php' ?>
  <script>
    $('.landowner_tea_rate').click(function() {
      $('.Landowner-details').hide();
      $('.from-container-outside').hide();
      $('.landowner-rate-outside').show();
    });

    $('.previous_requests').click(function() {
      $('.from-container-outside').hide();
      $('.landowner-rate-outside').hide();
      $('.Landowner-details').show();
    });

    $('.confirm_form').click(function() {
      $('.Landowner-details').hide();
      $('.landowner-rate-outside').hide();
      $('.from-container-outside').show();
    });
  </script>

  <?php include 'js/supervisor/manageRequestJs.php' ?>
  <?php include 'bottom-container.php'; ?>