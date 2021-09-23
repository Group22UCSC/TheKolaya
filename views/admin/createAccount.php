<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/createAccount.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/admin-queries.css">
<?php include 'topContainer.php';?>




    
   <div class="middle">CREATE ACCOUNTS</div>

   <div class="middle-conatiner">

     <div class="name">
       
       <label for="name">Name </label>
       <input type="text" name="name" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter your Name">
     </div>

     <div class="id">
        <label for="id">ID </label>
       <input type="text" name="id" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter your ID">
     </div>

     <div class="address">
       <label for="address"> Address </label>
       <input type="text" name="address" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter your Address">
     </div>

     <div class="type">
       <label for="type">Type(Landowner/Employee) </label>
       <input type="text" name="type" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter your Type">
      </div>

     <div class="phone"><label for="id">Phone Number </label>
       <input type="tel" name="phone" placeholder="Enter your Phone Number">
      </div>

     <div class="password"><label for="password">Password </label>
       <input type="password" name="password" placeholder="&nbsp;&nbsp;Enter your Password">
     </div>

     <div class="password1"><label for="password1">Confirm Password </label>
       <input type="password" name="password1" placeholder="&nbsp;&nbsp;Re-Enter your Password"></div>

      <div class="submit">
          <a href="#"><button class="btn btn-register" ><i class="fas fa-leaf"></i> REGISTER</button></a> 
      </div>
       

      
    </div>

<?php include 'views/bottomContainer.php';?>