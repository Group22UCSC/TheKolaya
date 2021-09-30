<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/manageRequests.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/form-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/table-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Manage Request</h2>
    </div>
    <!-- .middle-container .request-table .get-id .table-element -->
    <div class="middle-container">
      <div class="request-table">
        <div class="table-row-2"><div class="table-name"><b>Fertilizer Request</b></div></div>
        <div class="table-row-2 table-head">
          <div class="table-element"><b>Date</b></div>
          <div class="table-element"><b>Landowner ID</b></div>
          <div class="table-element"><b>Name</b></div>
          <div class="table-element"><b>Request Amount(kg)</b></div>
        </div>
          <?php
            for($i = 0; $i < 2; $i++) {
              echo '<div class="table-row-2 get-id">
                      <div class="table-element">2021/07/1'.$i.'</div>
                      <div class="table-element user-id">Lan-0'.$i.'</div>
                      <div class="table-element">Sasindu Wijegunasinghe</div>
                      <div class="table-element">50'.$i.'</div>
                    </div>';
            }
          ?>

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
          <div class="table-row"><div class="table-name"><b>Landowner Request Details</b></div></div>
          <div class="table-row table-head">
            <div class="table-element"><b>Request Date</b></div>
            <div class="table-element"><b>Tea Quality</b></div>
            <div class="table-element"><b>Monthly Tea Amount(kg)</b></div>
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

        </div>
    </div>
<?php include 'vendors/js/supervisor/table-js.php'?>
<?php include 'bottom-container.php';?>