<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/deleteAccount1.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/admin-queries.css">
<?php include 'topContainer.php';?>




    
   <div class="middle">DELETE ACCOUNTS</div>

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
       
      <div class="confirm">IF YOU WANT TO DELETE ACCOUNT</div> 

      <div class="confirm2">
         <div class="b1">
              <a href="#"><button class="btn b1"><i class="fas fa-hand-holding-usd"></i> NO</button></a>

         </div>

          <div class="b2">
              <a href="#"><button class="btn b2"><i class="fas fa-hand-holding-usd"></i> YES</button></a>

         </div>
         
         

      </div>


    </div>

<?php include 'views/bottomContainer.php';?>