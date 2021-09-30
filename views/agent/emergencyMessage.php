<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/teacollection.css">            
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>

<div class="page">
        <div class="title">
           Emergency Message
        </div>        
        <div class="form">
            <div class="inputfield">
                <label>Route No</label>
                <input type="text" class="input">
            </div>  
            <div class="inputfield">
                <label>Message</label>
               <textarea class="message" rows=5 columns=50 placeholder="Type your message here."></textarea>
            </div>        
            <div class="inputfield">
            <input type="submit" value="Send" class="btn">
            </div>
        </div>
      </div>	              
<?php include 'bottomContainer.php';?>

