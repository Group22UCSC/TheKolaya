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
<form class="searchform" id="searchTeaForm">
    <input type="date" id="searchdate" name="searchdate"  required>
    <input type="text" id="search" name="searchlid" placeholder="Enter Landowner ID.." required>
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
<!-- <script>
$(document).ready(function(){
  $("#submit").click(function(){
    $("#resultform").show();
  });
});
  </script> -->
  <script src="<?php echo URL ?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <!-- <script>
    $(document).ready(function() {
      $('#submit').click(function(event) {
        event.preventDefault();
        var form = $('#searchTeaForm').serializeArray();
        // form.push({name:'stock_type', value: 'in_stock'});
        // form.push({name:'type', value: 'fertilizer'});
        // // console.log(form);
        // $('.error').remove();
        var date = $('#searchdate').val();
        var landownerId = $('#search').val();
        // var priceForAmount = pricePerUnit*inAmount;
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Landowner ID: <span style=\"color:#01830c;\"><b>" + landownerId + "</b></span></div>" +
          "<div>Date :  <span style=\"color:#01830c;\"><b> " + date + "</b></span></div>" +
          "</div>" +
          "</div>";
          console.log('date'+date);
          console.log('lid'+landownerId);
         
        // if(inAmount == 0) {
        //     $('#in_amount').parent().after("<p class=\"error\">Please insert the amount</p>")
        // }else if(inAmount < 0) {
        //     $('#in_amount').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        // } 
        // if(pricePerUnit < 0) {
        //     $('#price_per_unit').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        // }else if(pricePerUnit == 0) {
        //     $('#price_per_unit').parent().after("<p class=\"error\">Please insert the price per unit</p>");
        // }

        // if(pricePerUnit <= 0 || inAmount <= 0) {
        //     return;
        // }
        Swal.fire({
          title: 'Are you sure?',
          html: '<div>' + str + '</div>',
          // text: "Price Per Unit: "+form[0]['value']+" "+"Amount: "+form[1]['value']+" "+"Price For Amount: "+priceForAmount,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#01830c',
          cancelButtonColor: '#ff3300',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#searchTeaForm").trigger("reset");
            $.ajax({
              type: "POST",
              
              cache: false,
              data: form,
              success: function(data) {
                // Swal.fire(
                //   'Updated!',
                //   'Your file has been updated.',
                //   'success'
                // ).then((result) => {
                //   location.reload();
                // })
                 document.getElementById("date").value = "2021-10-28";
                  
                  // console.log(data);
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
  </script> -->
  <script>
    $(document).ready(function () {
      $('#submit').click(function(event) {
        var form = $('#searchTeaForm').serializeArray();
        console.log(form);
        var date = $('#searchdate').val();
        var landownerId = $('#search').val();
    $.ajax({
      type: "POST",
      url: "<?php echo URL ?>agent/searchPreviousTeaUpdates",
      cache: false,
      data: form,
    }).done(function (data) {
      document.getElementById("date").value = "2021-10-28";
      console.log("success");
      console.log(data);
    });
    console.log('date'+date);
    console.log('lid'+landownerId);
    event.preventDefault();
  });
});
</script>
  <?php include 'bottomContainer.php';?>