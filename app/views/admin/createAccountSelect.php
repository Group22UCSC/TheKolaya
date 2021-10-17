
<?php include 'top-container.php';?>

 <link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/createAccountSelect.css">

 <div class="first">CREATE ACCOUNTS</div>

    <div class="middle">
       
            <div class="navbar">
 
  <div class="dropdown">
    <button class="dropbtn">Hey! Click here to create account 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <!--  <div class="header">
        <h2>Mega Menu</h2>
      </div>  -->  
      <div class="row">
        <div class="column">
          <h3>Create Full Accounts</h3>
          <a href="<?php echo URL?>admin/agent_land_account">Direct Landowner</a>
          <a href="<?php echo URL?>admin/agent_land_account">Indirect Landowner</a>
          <a href="<?php echo URL?>admin/agent_land_account">Agent</a>
          <a href="<?php echo URL?>admin/create_account">Accountant</a>
          <a href="<?php echo URL?>admin/create_account">Product Manager</a>
          <a href="<?php echo URL?>admin/create_account">Supervisor</a>
          <a href="<?php echo URL?>admin/create_account">Manager</a>
          <a href="<?php echo URL?>admin/create_account">Admin</a>
        </div>
        <div class="column">
          <h3>Create Temporary Accounts</h3>
          <a href="<?php echo URL?>admin/agent_land_tempAccount">Direct Landowner</a>
          <a href="<?php echo URL?>admin/agent_land_tempAccount">Indirect Landowner</a>
          <a href="<?php echo URL?>admin/agent_land_tempAccount">Agent</a>
          <a href="<?php echo URL?>admin/create_tempAccount">Accountant</a>
          <a href="<?php echo URL?>admin/create_tempAccount">Product Manager</a>
          <a href="<?php echo URL?>admin/create_tempAccount">Supervisor</a>
          <a href="<?php echo URL?>admin/create_tempAccount">Manager</a>
          <a href="<?php echo URL?>admin/create_tempAccount">Admin</a>
        </div>
      </div>
    </div>
  </div> 
</div>





    </div>
    
<?php include 'bottom-container.php';?>