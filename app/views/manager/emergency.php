

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/emergency.css">

   
 <div class="middle1"> 
  <a >EMERGENCY MESSAGES</a> </div>
  

<div class="k1">  
 <div class="wrapper1">
  <div class="title">  EMERGENCY DETAILS FORM </div>
     <form action="<?php echo URL?>manager/emergency" method="POST" id="emergencyForm">
      <div class="form">


        <div class="inputfield">
            <label>Message</label>
            <textarea class="input" rows=5 columns=50 id="message" name="message" placeholder="Type your message here."></textarea>
        </div>      


       <div class="inputfield">
        <div class="b">
           <input type="submit" value="Send" class="btn" id="sendBtn">
        </div>
           
       </div>
       </div> 
     </form>

    </div>

  </div> 
 </div> 

<?php include 'js/manager/emergencyjs.php';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<?php include 'bottom-container.php';?>