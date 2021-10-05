

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/createAccount.css">


     <div class="middle"> 
     <a >CREATE ACCOUNTS</a> </div>
  

  <div class="k1">
    

     
<div class="wrapper11">
    <div class="title">
     Employee Registration Form
    </div>

    <div class="form">
      
        <div class="inputfield">
          <label> Name</label>
          <input type="text" class="input">
       </div> 

        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input">
       </div> 

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea"></textarea>
       </div> 

        <div class="inputfield">
          <label>Type</label>
          
<select class="type" id="type">
  <option value="agent">Agent</option>
  <option value="accountant">Accountant</option>
  <option value="supervisor">Supervisor</option>
  <option value="product_manager">Product Manager</option>
  <option value="manager">Manager</option>
  <option value="admin">Admin</option>
</select>


       </div>

        <div class="inputfield">
          <label>Phone number</label>
          <input type="text" class="input">
       </div>

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input">
       </div>  

      <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" class="input">
       </div> 
       
      
       
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>

    </div>
   



  </div> 


      
   

<?php include 'bottom-container.php';?>

//r