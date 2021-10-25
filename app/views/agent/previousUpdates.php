<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">       
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/preupdates.css">  
    <script src="<?php echo URL?>vendors/js/agent/preupdates.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
<div class="topic">View Previous Updates</div>

<div class="update_buttons">
<button class="tea" onclick="loadTeaUpdates()"> Tea Updates </button>
<button class="request" onclick="loadRequestUpdates()"> Request Updates </button>

</div>


<?php include 'bottomContainer.php';?>

