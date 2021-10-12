<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/preupdates.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
<h3>View Previous Tea Updates</h3>
<div class="form-container">
<div class="searchform">
    <div class="inputarea">
<label for="date" >Enter Date:</label>
  <input type="date" id="date" name="date">
</div>
<div class="inputarea">
  <label for="lid">Enter ID:</label>
  <input type="text" id="lid" name="lid">
</div>
  <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
</div>

<div class="resultform">
    <div class="inputarea">
<label for="date" >Date:</label>
  <input type="date" id="resdate" name="date">
</div>
<div class="inputarea">
  <label >Landowner ID:</label>
  <input type="text" id="reslid" name="lid">
</div>
<div class="inputarea">
  <label >Initial Weight:</label>
  <input type="text" id="resweight" name="lid">
</div>
<div class="inputarea">
  <label >Request Type:</label>
  <input type="text" id="restype" name="lid">
</div>
<div class="inputarea">
  <label >Request Amount:</label>
  <input type="text" id="resamount" name="lid">
</div>
  
</div>
</div>
  <?php include 'bottomContainer.php';?>