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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script> -->
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
                <input type="text" id="route_no" name="route_no" value="<?php echo $_SESSION['route']?>" class="input" required>
            </div>  
            <div class="inputfield">
                <label>Message</label>
               <textarea class="input" rows=5 columns=50 id="message" name="message" placeholder="Type your message here."></textarea>
            </div>        
            <div class="inputfield">
            <input type="submit" value="Send" class="btn" id="link">
            </div>
        </form>
        </div>
      </div>	              
<?php include 'bottomContainer.php';?>


<script src="<?php echo URL ?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#link').click(function(event) {
        event.preventDefault();
        var form = $('#emergencyForm').serializeArray();
        // console.log(form);
        var route = $('#route_no').val();
        var message = $('#message').val();   
        Swal.fire({
          title: 'Are you sure to send the message?',         
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#01830c',
          cancelButtonColor: '#ff3300',
          confirmButtonText: 'Yes, Send!'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#emergencyForm").trigger("reset");
            $.ajax({
              type: "POST",
              url: "<?php echo URL ?>agent/sendEmergencyMessage",
              cache: false,
              data: form,
              success: function(response) {
                Swal.fire({
                  icon: 'success',
                  title: 'Sending Success !',
                  text: 'Your message has been sent.',
                  confirmButtonColor: '#01830c'
                }).then((result) => {
                  location.reload();                      
                })
                // console.log(data);
                console.log("success");
                console.log(response);
                console.log('route'+route);
                console.log('message'+message);
              },
              error: function(xhr, ajaxOptions, thrownError) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                  // footer: '<a href="">Why do I have this issue?</a>'
                })
              }
            })
          }
        })
      })
    })
  </script>
