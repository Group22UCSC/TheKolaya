<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/createAccounts-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="text">Create Accounts</div>
    <div class="middle-container">
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
<?php include 'bottom-container.php';?>



