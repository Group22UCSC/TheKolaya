<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/admin-style.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/admin-queries.css">
<?php include 'topContainer.php';?>

  <div class="middle-conatiner">
    
    <div class="middle-left">
      <button class="btn btn-view-accounts"><i class="fas fa-chart-line"></i> VIEW ACCOUNTS</button>
    </div>


    <div class="middle-right">
      <div class="btn-list">
        <a href="<?php echo URL?>admin/createAccount">create</a>
        <button class="btn btn-create-accounts" onclick="load('Admin/createAccount')"><i class="fas fa-user"></i> CREATE ACCOUNTS</button>

        <button class="btn btn-delete-accounts" ><i class="fas fa-leaf"></i> DELETE ACCOUNTS</button>

        <button class="btn btn-update-accounts"><i class="fas fa-hand-holding-usd"></i> UPDATE ACCOUNTS</button>
      </div>
      
    </div>

  </div>
  <script>
    function load(path) {
      window.location = path;
    }
  </script>
<?php include 'views/bottomContainer.php';?>
