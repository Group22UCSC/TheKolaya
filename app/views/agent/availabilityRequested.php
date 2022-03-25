<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">     
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/availabilityOn.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/toggle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Boxicons CDN Link -->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php include 'topContainer.php'; ?>   
  <!-- <div class="modal"> -->
    <div class="toggle-div" id="toggle-div">
    <!-- <button class="backbtn" onclick="back()">Logout </button><br> -->
    <div class="sad">
    <img src="<?php echo URL?>vendors/images/agent/sad.jpg" alt="sad">
    </div>
        <div class="note">You are unavailable at the moment.Please wait for the manager to make you available.</div>        
    </div>

    <script>
        function back(){
        window.location.replace("<?php echo URL ?>Login/logout");
        }
    </script>
    <?php include 'bottomContainer.php'; ?>