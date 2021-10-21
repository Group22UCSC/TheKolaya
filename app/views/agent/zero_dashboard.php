<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/zero_dashboard.css">      
    <script src="<?php echo URL?>vendors/js/agent/zero_dashboard.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
<?php include 'topContainer.php';?>
  <div class = "topic"><h3>My Dashboard</h3></div>
  <div class="main-content">
  <div class="flip-box">
  <div class="flip-box-inner" id="availableflip">
    <div class="flip-box-front" id = "availableflipfront">
      <p>6 landowners to collect leaves!</p>
    </div>
    <div class="flip-box-back">
    <p>Click the button to view list</p>
    <button class="viewavailablebtn" onclick = "loadAvailableList()">Go</button>
    </div>
  </div>

  
</div>
<div class="flip-box">
  <div class="flip-box-inner" id="deliveryflip">
    <div class="flip-box-front" id="deliveryflipfront" >
      <p>6 landowners to deliver!</p>
    </div>
    <div class="flip-box-back">
    <p>Click the button to view list</p>
    <button class ="viewdeliverybtn" onclick = "loadDeliveryList()">Go</button>
    </div>
  </div>

</div>
</div>

  <?php include 'bottomContainer.php'?>