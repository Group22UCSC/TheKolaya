
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
          <a href="<?php echo URL?>admin/DLandowner_createAccount">Direct Landowner</a>
          <a href="<?php echo URL?>admin/InDLandowner_createAccount">Indirect Landowner</a>
          <a href="<?php echo URL?>admin/create_agent">Agent</a>
          <a href="<?php echo URL?>admin/create_accountant">Accountant</a>
          <a href="<?php echo URL?>admin/create_Pmanager">Product Manager</a>
          <a href="<?php echo URL?>admin/create_supervisor">Supervisor</a>
          <a href="<?php echo URL?>admin/create_manager">Manager</a>
          <a href="<?php echo URL?>admin/create_admin">Admin</a>
        </div>
        <div class="column">
          <h3>Create Temporary Accounts</h3>
          <a href="<?php echo URL?>admin/DLandowner_create_Temp_Account">Direct Landowner</a>
          <a href="<?php echo URL?>admin/InDLandowner_create_Temp_Account">Indirect Landowner</a>
          <a href="<?php echo URL?>admin/create_agentTemp">Agent</a>
          <a href="<?php echo URL?>admin/">Accountant</a>
          <a href="<?php echo URL?>admin/">Product Manager</a>
          <a href="<?php echo URL?>admin/">Supervisor</a>
          <a href="<?php echo URL?>admin/">Manager</a>
          <a href="<?php echo URL?>admin/">Admin</a>
        </div>
      </div>
    </div>
  </div> 
</div>





    </div>
    
<?php include 'bottom-container.php';?>