<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/editProfile-style.css">    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
    <div class="title-container">
        <h2>Edit Profile</h2>
    </div>
    <div class="middle-container">
    <div class="from-container-outside">
        <div class="form-container">
          <div class="title">Edit Your Profile</div>
          <form action="#">
            <div class="form">
              <div class="inputfield">
                <label>Name</label>
                <input type="text" class="input" id="Name" value="<?php echo 'Roneki'?>">
              </div>
              <div class="inputfield">
                <label>Mobile Number</label>
                <input type="number" class="input" id="Mobile-number" value="<?php echo '0777816920'?>">
              </div>
                <div class="inputfield" id="left-btn">
                    <input type="button" value="Change Password" class="accept-btn change">
                </div>
            <div id="hide-inputfield">
                <div class="inputfield">
                    <label>Old Password</label>
                    <input type="password" class="input" >
                </div>
                <div class="inputfield">
                    <label>New Password</label>
                    <input type="password" class="input" >
                </div>
                <div class="inputfield">
                    <label>Confirm Password</label>
                    <input type="password" class="input" >
                </div>
                
            </div>
                <div class="inputfield" id="right-btn">
                    <input type="submit" value="Accept" class="accept-btn"name="accept-btn">
                </div>
            
            </div>
          </form>
        </div>
      </div>
    </div>
<script src="<?php echo URL?>vendors/js/editProfile.js"></script>
<?php include 'bottomContainer.php';?>
