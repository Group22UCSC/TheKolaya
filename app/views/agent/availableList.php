<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/deliverypopup.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <!-- Boxicons CDN Link -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
<?php include 'topContainer.php';?>


<button class="btn clear">CLEAR FORM</button>


<div class="confirm-wrapper">
	<div class="overlay"></div>
	<div class="confirm">
		<div class="content">
			<p>Are you sure you want to clear this form?</p>
		</div>
		<div class="btn-wrap">
			<button value="Yes" class="yes">Yes</button>
			<button value="No" class="no">No</button>
		</div>
	</div>
</div>  

<script>
  $(document).ready(function() {
	var clear = $(".clear"),
	    wrapper = $(".confirm-wrapper"),
	    overlay = $(".confirm-wrapper .overlay"),
	    confirm = $(".confirm-wrapper .confirm");
	
	clear.click(function() {
		wrapper.addClass("show");
		overlay.addClass("show");
		confirm.addClass("show");
	});
	
	
	$(".confirm-wrapper .btn-wrap button.yes").click(function() {
		window.location.replace("updateTeaWeight");
	});
										    
	$(".confirm-wrapper .btn-wrap button.no").click(function() {
		wrapper.removeClass("show");
		overlay.removeClass("show");
		confirm.removeClass("show");
	});
	
});
</script>

<?php include 'bottomContainer.php';?>