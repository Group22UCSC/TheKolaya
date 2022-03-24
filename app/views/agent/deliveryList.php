<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/agent.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/deliverylist.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/unavailableNotice.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/searchbar.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/delivery-table.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/delivery-table2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'topContainer.php'; ?>
  <div class="topic">Request Delivery List </div>
  <?php include 'unavailableNotice.php'; ?>
  <?php include 'agentUnavailableNotice.php'; ?>
  <div class="deliverylist" id="deliveryList">
    <div class=fertilizer_topic id="fertilizer_topic"> Fertilizer </div>
    <form class="searchform" id="fertilizersearchform">
      <input type="text" id="searchf" placeholder="Enter Landowner ID.." onkeyup="searchFertilizerTable()">
      <!-- <input type="submit" value="search" id="submit"> -->
    </form>
    <div class="table-wrapper">
      <!-- <div class="table_header">Today Available landowners</div> -->
      <div class="table" id="today_fertilizer_table">
        <div class="row tabel-header">
          <div class="cell" id="th">Landowner ID</div>
          <div class="cell" id="th">Name</div>
          <div class="cell" id="th">Request ID</div>  
          <div class="cell" id="th">Amount</div>        
          <div class="cell" id="th">Address</div>         
          <div class="cell" id="th">Route</div>
        </div>
        <?php
        if ($data1!=0){
          $f = count($data1);
        }
        else{
          $f="0";
        }

        if (!empty($data1)) {
          for ($i = 0; $i < count($data1); $i++) {
            echo '<div class="row table2-row" id="fullrow">
                      <div class="cell" id="tr"data-title="Landowner_id">' . $data1[$i]['lid'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Name">' . $data1[$i]['name'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Request ID">' . $data1[$i]['request_id'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Request ID">' . $data1[$i]['amount'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Address">' . $data1[$i]['address'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Route">' . $data1[$i]['route_no'] . '</div>
                    </div>';
          }
        }
        ?>
      </div>
    </div>
  </div>
  <div class="deliverylist" id="deliveryList">
    <div class="advance_topic" id="advance_topic"> Advance </div>
    <form class="searchform" id="advancesearchform">
      <input type="text" id="searcha" placeholder="Enter Landowner ID.." onkeyup="searchAdvanceTable()">
      <!-- <input type="submit" value="search" id="submit"> -->
    </form>
    <div class="table-wrapper">
      <!-- <div class="table_header">Today Available landowners</div> -->
      <div class="table" id="today_advance_table">
        <div class="row tabel-header">
          <div class="cell" id="th">Landowner ID</div>
          <div class="cell" id="th">Name</div>
          <div class="cell" id="th">Request ID</div>
          <div class="cell" id="th">Amount</div>          
          <div class="cell" id="th">Address</div>
          <div class="cell" id="th">Route</div>
        </div>
        <?php
          if ($data2!=0){
            $a = count($data2);
          }
          else{
            $a="0";
          }

        if (!empty($data2)) {
          for ($i = 0; $i < count($data2); $i++) {
            echo '<div class="row table2-row" id="fullrow">
                      <div class="cell" id="tr"data-title="Landowner_id">' . $data2[$i]['lid'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Name">' . $data2[$i]['name'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Request ID">' . $data2[$i]['request_id'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Request ID">' . $data2[$i]['amount_rs'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Address">' . $data2[$i]['address'] . '</div>
                      <hr class="horizontal-line">
                      <div class="cell" id="tr" data-title="Route">' . $data2[$i]['route_no'] . '</div>
                    </div>';
          }
        }
        ?>
      </div>
    </div>    
  </div>

  <?php include 'deliveryform.php'; ?>
  <!-- 'deliverypopup.php';   -->
  <script src="<?php echo URL ?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      if (<?php echo $a ?> == '0' && <?php echo $f ?> == '0') {
        // console.log('zero landowners');
        $('#fertilizersearchform').hide();
        $('#advancesearchform').hide();
        $('#today_fertilizer_table').hide();
        $('#today_advance_table').hide();
        $('#advance_topic').hide();
        $('#fertilizer_topic').hide();
        $('#unavailable_notice').show();
        $('#note').html("Sorry, No fertilizer or advance requests to deliver!");
      } else if (<?php echo $a ?> == '0' && <?php echo $f ?> != '0') {
        $('#advancesearchform').hide();
        $('#advance_delivery_table').hide();
        $('#advance_topic').hide();
        $('#unavailable_notice').show();
        $('#note').html("Sorry, No advance requests to deliver!");
      } else if (<?php echo $a ?> != '0' && <?php echo $f ?> == '0') {
        $('#fertilizersearchform').hide();
        $('#fertilizer_delivery_table').hide();
        $('#fertilizer_topic').hide();
        $('#unavailable_notice').show();
        $('#note').html("Sorry, No fertilizer requests to deliver!");
      }

      if (<?php echo $_SESSION['availability'] ?> == '0') {
        console.log('zero landowners');
        $('#fertilizersearchform').hide();
        $('#advancesearchform').hide();
        $('#fertilizer_delivery_table').hide();
        $('#advance_delivery_table').hide();
        $('#advance_topic').hide();
        $('#fertilizer_topic').hide();
        $('#unavailable_notice').hide();
        $('#agent_unavailable_notice').show();
      }

      $('#myBtn').click(function(event) {
        event.preventDefault();
        var form = $('#deliveryUpdateForm').serializeArray();
        // form.push({name:'stock_type', value: 'in_stock'});
        // form.push({name:'type', value: 'fertilizer'});
        // // console.log(form);
        // $('.error').remove();
        var requestId = $('#rid').val();
        var landownerId = $('#lid').val();
        var requestType = $('#rtype').val();
        var amount = $('#amount').val();
        // var priceForAmount = pricePerUnit*inAmount;
        if (requestType == 'Fertilizer') {
          var str = "<div style=\"display:flex; justify-content:center;\">" +
            "<div style=\"text-align:left;\">" +
            "<div>Request ID : <span style=\"color:#01830c;\"><b>" + requestId + "</b></span></div>" +
            "<div>Landowner ID : <span style=\"color:#01830c;\"><b>" + landownerId + "</b></span></div>" +
            "<div>Request Type : <span style=\"color:#01830c;\"><b>" + requestType + "</b></span></div>" +
            "<div>Requested Amount :  <span style=\"color:#01830c;\"><b> " + amount + " kg</b></span></div>" +
            "</div>" +
            "</div>";
        } else if (requestType == 'Advance') {
          var str = "<div style=\"display:flex; justify-content:center;\">" +
            "<div style=\"text-align:left;\">" +
            "<div>Request ID : <span style=\"color:#01830c;\"><b>" + requestId + "</b></span></div>" +
            "<div>Landowner ID : <span style=\"color:#01830c;\"><b>" + landownerId + "</b></span></div>" +
            "<div>Request Type : <span style=\"color:#01830c;\"><b>" + requestType + "</b></span></div>" +
            "<div>Requested Amount :  <span style=\"color:#01830c;\"><b> Rs " + amount + "</b></span></div>" +
            "</div>" +
            "</div>";
        }

        console.log('requestid' + requestId);
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
          confirmButtonText: 'Yes, Update!'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#deliveryUpdateForm").trigger("reset");
            $.ajax({
              type: "POST",
              url: "<?php echo URL ?>agent/updateRequest",
              cache: false,
              data: form,
              success: function(data) {
                Swal.fire(
                  'Updated!',
                  'Your file has been updated.',
                  'success'
                ).then((result) => {
                  location.reload();
                })
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
  </script>
  <?php include 'bottomContainer.php'; ?>
  <script>
    // document.addEventListener("DOMContentLoaded", () => {
    //   const rows = document.querySelectorAll("tr[data-href-request]");
    //   rows.forEach(row => {
    //     row.addEventListener("click", () => {
    //       openrequestform();
    //     });
    //   });
    // });

    var table = $("#today_fertilizer_table");
    table.click(function(event) {
      if (!$(event.target.parentNode).hasClass("tabel-header")) {
        document.getElementById("rid").value = event.target.parentNode.firstElementChild.innerHTML;
        document.getElementById("lid").value = event.target.parentNode.firstElementChild.innerHTML;
        document.getElementById("rtype").value ="Fertilizer"; 
        document.getElementById("amount").value = event.target.parentNode.firstElementChild.innerHTML;

        // document.getElementById("rid").value = this.cells[1].innerHTML;
        // document.getElementById("lid").value = this.cells[0].innerHTML;
        // document.getElementById("rtype").value = "Fertilizer";
        // document.getElementById("amount").value = this.cells[2].innerHTML;
        openrequestform()
      }
    })

    var table = $("#today_advance_table");
    table.click(function(event) {
      if (!$(event.target.parentNode).hasClass("tabel-header")) {
        document.getElementById("rid").value = event.target.parentNode.firstElementChild.innerHTML;
        document.getElementById("lid").value = event.target.parentNode.firstElementChild.innerHTML;
        document.getElementById("rtype").value ="Advance"; 
        document.getElementById("amount").value = event.target.parentNode.firstElementChild.innerHTML;

        // document.getElementById("rid").value = this.cells[1].innerHTML;
        // document.getElementById("lid").value = this.cells[0].innerHTML;
        // document.getElementById("rtype").value = "Fertilizer";
        // document.getElementById("amount").value = this.cells[2].innerHTML;
        openrequestform()
      }
    })
    function openrequestform() {
      document.getElementById("requestpopup").style.display = "block";
      // var blur = document.getElementById('blur');
      // blur.classList.toggle('active');
    }

    function closerequestform() {
      document.getElementById("requestpopup").style.display = "none";
      // var blur = document.getElementById('blur');
      // blur.classList.toggle('close');
    }
    // var table1 = document.getElementById('fertilizer_delivery_table');

    // for (var i = 1; i < table1.rows.length; i++) {
    //   table1.rows[i].onclick = function() {
    //     //rIndex = this.rowIndex;
    //     document.getElementById("rid").value = this.cells[1].innerHTML;
    //     document.getElementById("lid").value = this.cells[0].innerHTML;
    //     document.getElementById("rtype").value = "Fertilizer";
    //     document.getElementById("amount").value = this.cells[2].innerHTML;

    //   };
    // }

    // var table2 = document.getElementById('advance_delivery_table');

    // for (var i = 1; i < table2.rows.length; i++) {
    //   table2.rows[i].onclick = function() {
    //     //rIndex = this.rowIndex;
    //     document.getElementById("rid").value = this.cells[1].innerHTML;
    //     document.getElementById("lid").value = this.cells[0].innerHTML;
    //     document.getElementById("rtype").value = "Advance";
    //     document.getElementById("amount").value = this.cells[2].innerHTML;

    //   };
    // }

    function openpopup() {
      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 

      modal.style.display = "block";
      var a = document.getElementById("rid").value;
      document.getElementById("rid-pop").value = a;
      var b = document.getElementById("lid").value;
      document.getElementById("lid-pop").value = b;
      var c = document.getElementById("rtype").value;
      document.getElementById("rtype-pop").value = c;
      var d = document.getElementById("amount").value;
      document.getElementById("amount-pop").value = d;


      // When the user clicks on <span> (x), close the modal
      // span.onclick = function() {
      //   modal.style.display = "none";
      // }

      // When the user clicks anywhere outside of the modal, close it
      // window.onclick = function(event) {
      //   if (event.target == modal) {
      //     modal.style.display = "none";
      //   }

    }

    function closepopup() {
      document.getElementById("myModal").style.display = "none";
      //  var blur = document.getElementById('blur');
      // blur.classList.toggle('maindiv');

    }

    function closeformpopup() {
      document.getElementById("myModal").style.display = "none";
      closerequestform();

      //document.getElementById("availableTable").deleteRow(1);

    }

    // function clearWeight(){   
    //     document.getElementById("weight").value=" ";
    //   }

    function searchAdvanceTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searcha");
      filter = input.value.toUpperCase();
      table = document.getElementById("advance_delivery_table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    function searchFertilizerTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchf");
      filter = input.value.toUpperCase();
      table = document.getElementById("fertilizer_delivery_table");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>