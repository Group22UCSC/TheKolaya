<?php include 'topContainer.php';?>
<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/teacollection.css">        
<div class="wrapper">
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

