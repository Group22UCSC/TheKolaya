<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/manageRequests.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Manage Request</h2>
    </div>
    <div class="middle-container">
      <div class="request-table">
        <div class="table-row-2"><div class="table-name"><b>Fertilizer Request</b></div></div>
        <div class="table-row-2 table-head">
          <div class="table-element">Date</div>
          <div class="table-element">Landowner ID</div>
          <div class="table-element">Name</div>
          <div class="table-element">Request Amount(kg)</div>
        </div>
          <?php
            for($i = 0; $i < 2; $i++) {
              echo '<div class="table-row-2">
                      <div class="table-element">2021/07/1'.$i.'</div>
                      <div class="table-element">Lan-0'.$i.'</div>
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
                <input type="text" class="input">
              </div>
              <div class="inputfield">
                <label>Address</label>
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
            <div class="table-element">Request Date</div>
            <div class="table-element">Tea Quality</div>
            <div class="table-element">Monthly Tea Amount(kg)</div>
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
<?php include 'bottom-container.php';?>