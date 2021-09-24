<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/manager-style.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/manager-queries.css">
<?php include 'topContainer.php';?>

  <div class="middle-conatiner">

    <div class="middle-left">
        <div class="btn-list">
          <a href="<?php echo URL?>manager/viewAccount"> <button class="btn btn-account"><i class="fas fa-user"></i> ACCOUNTS</button></a>

           <a href="<?php echo URL?>manager/viewTeaQuality"> <button class="btn btn-tea"><i class="fas fa-leaf"></i>TEA QUALITY</button></a>

          <button class="btn btn-payments"><i class="fas fa-hand-holding-usd"></i> PAYMENTS</button>

          <button class="btn btn-report"><i class="fas fa-question"></i> REPORT</button>
        </div>
    </div>


    <div class="middle-right">
        <p class="long-copy">
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        </p>
        
        <button class="btn btn-stock"><i class="fas fa-chart-line"></i> STOCK DETAILS</button>
    </div>
    
  </div>
<?php include 'views/bottomContainer.php';?>
