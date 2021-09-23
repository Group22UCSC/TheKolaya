<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/admin-style.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/admin-queries.css">
<?php include 'topContainer.php';?>
 <div class="middle">ADMIN</div>
  <div class="middle-conatiner">
    
    <div class="middle-left">
       <a href="<?php echo URL?>admin/viewAccount"><button class="btn btn-view-accounts"><i class="fas fa-chart-line"></i> VIEW ACCOUNTS</button></a>
    </div>


    <div class="middle-right">
      <div class="btn-list">
        <a href="<?php echo URL?>admin/createAccount"><button class="btn btn-create-accounts"><i class="fas fa-user"></i> CREATE ACCOUNTS</button></a>

        <a href="#"><button class="btn btn-delete-accounts" ><i class="fas fa-leaf"></i> DELETE ACCOUNTS</button></a>
        
        <a href="<?php echo URL?>admin/updateAccount"><button class="btn btn-update-accounts"><i class="fas fa-hand-holding-usd"></i> UPDATE ACCOUNTS</button></a>

        
      </div>
      
    </div>

  </div>

<?php include 'views/bottomContainer.php';?>
