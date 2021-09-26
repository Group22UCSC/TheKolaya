<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/outStock-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/table-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Firewood Usage Details</h2>
    </div>
    <div class="middle-container">
        <div class="form-container">
            <form action="#">
                <div class="form">
                    <div class="inputfield">
                    <label class="search-lable">Search Useage by Date</label>
                    <input type="date" class="search-label input">
                    <input type="submit" value="Search" class="accept-btn">
                    </div>
                </div>
            </form>
        </div>
        
        <div class="table-container">
          <div class="table-row table-head">
            <div class="table-element"><b>Date</b></div>
            <div class="table-element"><b>Amount(kg)</b></div>
            <div class="table-element"><b>Emp_id</b></div>
          </div>
          <?php
            for($i = 0; $i < 1; $i++) {
              echo '<div class="table-row">
                      <div class="table-element">Lan-00'.$i.'</div>
                      <div class="table-element">Sasindu Wijegunasinghe</div>
                      <div class="table-element">50'.$i.'</div>
                    </div>';
            }
          ?>
        </div>

        <div class="table-container">
          <div class="table-row table-head">
            <div class="table-element"><b>Date</b></div>
            <div class="table-element"><b>Amount(kg)</b></div>
            <div class="table-element"><b>Emp_id</b></div>
          </div>
          <?php
            for($i = 0; $i < 3; $i++) {
              echo '<div class="table-row">
                      <div class="table-element">Lan-00'.$i.'</div>
                      <div class="table-element">Sasindu Wijegunasinghe</div>
                      <div class="table-element">50'.$i.'</div>
                    </div>';
            }
          ?>

          <div class="table-row">
            <a href="<?php echo URL?>Supervisor/firewoodStock"><button class="table-btn">Firewood Stock</button></a>
          </div>
        </div>
    </div>
<?php include 'bottom-container.php';?>

