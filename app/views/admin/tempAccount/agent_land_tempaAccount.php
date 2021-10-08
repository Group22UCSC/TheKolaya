
<?php include '../app/views/admin/top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/create_Account.css">


     <div class="middle"> 
     <a >CREATE ACCOUNTS</a> </div>
  

  <div class="k1">
<div class="wrapper11">
    <div class="title">
    Registration Form
    </div>
   <form action="#" method="POST">
      <div class="form">

         <div class="inputfield">
            <label>Uesr ID</label>
            <input type="text" class="input" name="user_id" required>
         </div> 

         <div class="inputfield">
            <label>User Type</label>
            <select class="type" id="type" name="user_type" required>
               <option value="agent">Agent</option>
               <option value="direct_landowner">Direct Landowner</option>
               <option value="indirect_landowner">Indirect Landowner</option>
            </select>
         </div>

         <div class="inputfield">
            <label>Contact Number</label>
            <input type="text" class="input" name="contact_number" required>
         </div>

         <div class="inputfield">
            <label>Route number</label>
            <input type="text" class="input" name="route_number" required>
         </div>

         <div class="inputfield">
            <input type="submit" value="Register" class="btn">
         </div>
      </div>
   </form>
</div> 

<?php include '../app/views/admin/bottom-container.php';?>