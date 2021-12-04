<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/searchbar.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/preteaupdates.css"> 
    <script src="<?php echo URL?>vendors/js/agent/preteaupdates.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
<div class="topic">View Previous Tea Updates</div>
<button class="backbtn" onclick="goBack()">Back </button>
<div class="form-container">
<form class="searchform">
    <input type="date" id="date" name="date"  required>
    <input type="text" id="search" placeholder="Enter Landowner ID.." required>
    <!-- <button id="search">Search</button> -->
    <input type="button" value="search" id="submit">
</form>
<form class="resultform" id="resultform">
<div class="inputfield">
    <label class="resultlbl">Agent ID</label>
    <input type="text" id="ramount"  size="6"  readonly>
    </div>    
  <div class="inputfield">
    <label class="resultlbl">Landowner ID</label>
    <input type="text" id="lid"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Date</label>
    <input type="date" id="date" name="date"  size="6"  readonly>
    </div>    
    <div class="inputfield">
    <label class="resultlbl">Initial Weight (Agent)</label>
    <input type="text" id="rtype"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Initial Weight (Supervisor)</label>
    <input type="text" id="rtype"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Net Weight</label>
    <input type="text" id="ramount"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Water Percentage</label>
    <input type="text" id="ramount"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Container Percentage</label>
    <input type="text" id="ramount"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Matured Leaves Percentage</label>
    <input type="text" id="ramount"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Quality</label>
    <input type="text" id="ramount"  size="6"  readonly>
    </div>    
    
</form>
</div>
<script>
$(document).ready(function(){
  $("#submit").click(function(){
    $("#resultform").show();
  });
});
  </script>
  <?php include 'bottomContainer.php';?>