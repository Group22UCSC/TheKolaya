

<?php include '../app/views/admin/top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/create_Account.css">


     <div class="middle"> 
     <a >CREATE TEMPORARY ACCOUNTS</a> </div>
  

  <div class="k1">

     
<div class="wrapper11">
    <div class="title">
    Registration Form
    </div>
    <form action="#" method="POST">
    <div class="form">
        <div class="inputfield">
          <label> Name</label>
          <input type="text" class="input" name="name" required>
       </div>
       <div class="inputfield">
          <label>User Type</label>
          <select class="type" id="type" name="user_type" required>
            <option value="accountant">Accountant</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="supervisor">Supervisor</option>
            <option value="product_manager">Product Manager</option>
          </select>
       </div>
        <div class="inputfield">
          <label>User ID</label>
          <input type="text" class="input" name="user_id" required>
       </div>
        <div class="inputfield">
          <label>Contact number</label>
          <input type="text" class="input" name="contact_number" required>
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </div>
    </form>
  </div>
  <?php include '../app/views/admin/bottom-container.php';?>

