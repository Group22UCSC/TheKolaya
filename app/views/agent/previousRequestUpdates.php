<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/agent.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/searchbar.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/preteaupdates.css">
  <script src="<?php echo URL ?>vendors/js/agent/preteaupdates.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'topContainer.php'; ?>
  <div class="topic">View Previous Request Updates</div>
  <button class="backbtn" onclick="goBack()">Back </button>
  <div class="form-container">
    <form class="searchform" id="searchRequestForm">
      <input type="date" id="searchdate" name="searchdate" required>
      <input type="text" id="search" name="searchlid" placeholder="Enter Landowner ID.." required>
      <select id="dropdown" name="searchtype" required>
        <option value="" disabled selected hidden><span>Choose </span>Request Type..</option>
        <option>Advance</option>
        <option>Fertilizer</option>
      </select>
      <input type="button" value="search" id="submit">
    </form>
    <form class="resultform" id="resultform">
      <div class="inputfield">
        <label class="resultlbl">Agent ID</label>
        <input type="text" id="lid" size="6" readonly>
      </div>
      <div class="inputfield">
        <label class="resultlbl">Landowner ID</label>
        <input type="text" id="lid" size="6" readonly>
      </div>
      <div class="inputfield">
        <label class="resultlbl">Request Date</label>
        <input type="date" id="rdate" name="date" size="6" readonly>
      </div>
      <div class="inputfield">
        <label class="resultlbl">Confirm Date</label>
        <input type="date" id="cdate" name="date" size="6" readonly>
      </div>
      <div class="inputfield">
        <label class="resultlbl">Delivered Date</label>
        <input type="date" id="cdate" name="date" size="6" readonly>
      </div>
      <div class="inputfield">
        <label class="resultlbl">Request Type</label>
        <input type="text" id="rtype" size="6" readonly>
      </div>
      <div class="inputfield">
        <label class="resultlbl">Amount</label>
        <input type="text" id="ramount" size="6" readonly>
      </div>


    </form>
  </div>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var error = {
        'date': false,
        'landowner_id': false,
        'request_type': false
      };

      $('#submit').click(function(event) {
        var form = $('#searchRequestForm').serializeArray();
        // console.log(form);
        var date = $('#searchdate').val();
        var landownerId = $('#search').val();
        var requestType = $('#dropdown').val();
        var givenDate = new Date(date);
        const today = new Date();


        $('.error').remove();
        //Validate the date
        if(date == "") {
          error.date = true;
          $('#searchdate').after("<p class=\"error\">*Please enter the date</p>");
        }else if(givenDate > today) {
          error.date = true;
          $('#searchdate').after("<p class=\"error\">*Date is not valid</p>");
        }else {
          error.date = false;
        }

        //Validate the landowner
        if(landownerId == "") {
          error.landowner_id = true;
          $('#search').after("<p class=\"error\">*Please enter the Landowner ID</p>");
        }else {
          $.ajax({
            url: "<?php echo URL?>Agent/checkLandowner",
            type: "POST",
            cache: false,
            data: "landowner_id="+landownerId,
            success: function(responseText) {
              if(responseText == "false") {
                error.landowner_id = true;
                $('#search').after("<p class=\"error\">*This landowner id is not valid</p>");
              } else if(responseText = "true") {
                error.landowner_id = false;
              }
            }
          });
        }

        //Validate the request type
        if(requestType == null) {
          error.request_type = true;
          $('#dropdown').after("<p class=\"error\">*Please enter the request Type</p>");
        }else {
          error.request_type = false;
        }

        if (error.date || error.landowner_id || error.request_type) {
          return
        }
        $.ajax({
          type: "POST",
          url: "<?php echo URL ?>Agent/searchPreviousRequestUpdates",
          cache: false,
          data: form,
        }).done(function(response) {
          // console.log("success");
          // console.log(response);
          $("#resultform").show();
          $('#resultform').html(response);

        });
        // console.log('date' + date);
        // console.log('lid' + landownerId);
        event.preventDefault();
      });
    });
  </script>
  <?php include 'bottomContainer.php'; ?>