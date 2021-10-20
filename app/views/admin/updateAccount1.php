

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/updateAccount1.css">


     <div class="middle"> 
     <a >UPDATE ACCOUNTS</a> </div>
  

  <div class="k1">  

<div class="wrapper1">
    <div class="title">  Update Form  </div>

    
      
<form action="<?php echo URL?>admin/updateAccount1" method="POST">
      <div class="form">

        <div class="inputfield">
          <label> Name</label>
           <input type="text" class="input" name="name" required>
       </div> 

        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input" name="user_id" required>
       </div> 

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" required></textarea>
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
          <label>Contact Number</label>
            <input type="tel" class="input" name="contact_number" required>
       </div>

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="password" required>
       </div>  

       <div class="inputfield">
            <label>Confirm Password</label>
            <input type="password" class="input" name="confirm_password" required>
         </div>

       <div class="inputfield">
          <a>If you want to update the account</a>
      
       </div> 

      
      <div class="last">
            <div class="a">
       <a href="<?php echo URL?>admin/updateAccount1"><input type="submit" value="Discard" class="btn"></a>
      </div>


       <div class="b">
        <input type="submit" value="Update" class="btn">
      </div>
           

      </div>

     </form>

    </div>

  </div> 
</div>
<?php include 'bottom-container.php';?>