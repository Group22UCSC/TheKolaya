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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
            $x = count($data);
            if($x > 0) {
              for($i = 0; $i < $x; $i++) {
                echo '<div class="table-row-2 get-id">
                        <div class="table-element">'.$data[$i]['request_date'].'</div>
                        <div class="table-element user-id">'.$data[$i]['lid'].'</div>
                        <div class="table-element">'.$data[$i]['name'].'</div>
                        <div class="table-element">'.$data[$i]['amount'].'</div>
                      </div>';
              }
            }else {
              echo '<p>No data found</p>';
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
            <!-- <div class="table-element"><b>Tea Quality</b></div> -->
            <div class="table-element"><b>Monthly Tea Amount(kg)</b></div>
          </div>
          <?php
            for($i = 0; $i < 2; $i++) {
              echo '<div class="table-row">
                      <div class="table-element">Lan-00'.$i.'</div>
                      <div class="table-element">50'.$i.'</div>
                    </div>';
            }
          ?>

        </div>
        <div class="landowner-rate-outside">
          <div class="landowner-rate">
            <h2 style="color: #4DD101; text-align:center; margin-bottom:10px;">Sasindu's Tea Quality</h2>
            <div class="row">
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
<?php include 'js/supervisor/table-js.php'?>
<?php include 'bottom-container.php';?>