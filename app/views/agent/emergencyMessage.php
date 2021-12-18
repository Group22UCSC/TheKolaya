<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/emergency.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>                
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
<div class="topic">Send Emergency Message </div>
<div class="page">
        <div class="title">
           Emergency Message
        </div>        
        <div class="form">
        <form class="emergencyForm" id="emergencyForm">
            <div class="inputfield">
                <label>Route No</label>
                <input type="text" id="route_no" value="<?php echo $_SESSION['route']?>" class="input" required>
            </div>  
            <div class="inputfield">
                <label>Message</label>
               <textarea class="input" rows=5 columns=50 id="message" placeholder="Type your message here."></textarea>
            </div>        
            <div class="inputfield">
            <input type="submit" value="Send" class="btn" id="link">
            </div>
        </form>
        </div>
      </div>	              
<?php include 'bottomContainer.php';?>

<script>
  $(document).on('click', '#link', function(e) {
		    swal({
				title: "Are you sure ?", 
				type: "warning",
				confirmButtonText: "Yes",
				showCancelButton: true,
        confirmButtonColor:'#4DD101',
        cancelButtonColor:'#FF2400',
        confirmButtonText: 'Yes, Send it!'
		    })
		    	.then((result) => {
					if (result.value) {
            swal(
				      '<b style="color:green;"> Message Sent',
				      'You clicked the <b style="color:green;">Success</b> button!',
			      	'success'
			)
					} else if (result.dismiss === 'cancel') {
					    swal(
					      'Cancelled',
					      'Type another message',
					      'error'
					    )
					}
				})
		});
    
    $(document).ready(function () {
      $('#link').click(function(event) {       
        var form = $('#emergencyForm').serializeArray();
        // console.log(form);
        var route = $('#route_no').val();
        var message = $('#message').val();
    $.ajax({
      type: "POST",
      url: "<?php echo URL ?>agent/sendEmergencyMessage",
      cache: false,
      data: form,
    }).done(function (response) {      
      console.log("success");
      // console.log(response);     
      // $('#emergencyForm').html(response);
      
    });
    console.log('route'+route);
    console.log('message'+message);
    event.preventDefault();
  });
});
    </script>

