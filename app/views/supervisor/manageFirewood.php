<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/form-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/table-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/stock-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Update Firewood Details</h2>
    </div>
    <div class="middle-container">
      <div class="form-instock">
        <div class="form-container">
          <div class="title">
            Firewood Purchase
          </div>
          <form method="POST" id="form_instock">
            <div class="form">
              <div class="inputfield">
                <label>Price per unit</label>
                <input type="number" class="input" name="price_per_unit" id="price_per_unit">
              </div>  
              <div class="inputfield">
                <label>Amount(kg)</label>
                <input type="number" class="input" name="amount" id="in_amount">
              </div>  
              
              <div class="inputfield">
                <input type="submit" value="Sumbit" class="accept-btn" name="firewood_in" id="instock_submit_btn">
              </div>
              <a href="<?php echo URL?>Supervisor/firewoodInStock">
                <div class="inputfield">
                  <input type="button" value="Firewood Purchase Details" class="accept-btn">
                </div>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="form-outstock">
        <div class="form-container">
          <div class="title">
            Firewood use
          </div>
          <form action="<?php echo URL?>Supervisor/manageFirewood" method="POST" id="form_outstock">
            <div class="form">
                <div class="inputfield">
                  <label>Amount(kg)</label>
                  <input type="number" class="input" name="amount" id="out_amount" >
                </div>  
                
              <div class="inputfield">
                <input type="submit" value="Submit" class="accept-btn" id="out-stock-submit" name="firewood_out">
              </div>
              <a href="<?php echo URL?>Supervisor/firewoodOutStock">
                <div class="inputfield">
                  <input type="button" value="Firewood Usage Details" class="accept-btn">
                </div>
              </a>
            </div>
          </form>
        </div>
      </div>
      
    </div>
    <script src="<?php echo URL?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
    <script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>   
<?php include 'js/supervisor/manageFirewood-js.php';?>
<?php include 'bottom-container.php';?>