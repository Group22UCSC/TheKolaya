<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/agent.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/availablelist.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/unavailableNotice.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/searchbar.css">
  <script src="<?php echo URL ?>vendors/js/agent/dashboard.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Boxicons CDN Link -->
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'topContainer.php'; ?>
  <?php
  if ($data != 0) {
    $x = count($data);
  } else {
    $x = "0";
  }
  // $x = count($data);
  ?>
  <div class="topic">Tea Available Landowner List </div>
  <form class="searchform" id="searchform">
    <input type="text" id="search" placeholder="Enter Landowner ID.." onkeyup="searchTable()">
    <!-- <input type="submit" value="search" id="submit"> -->
  </form>
  <div class="availablelist">    
    <?php include 'unavailableNotice.php';?>
    <?php include 'agentUnavailableNotice.php';?>
    <table class="availabletable" id="availabletable">
      <tr>
        <td class="th">Landowner ID</td>
        <td class="th">Name</td>
        <td class="th">Container Estimation</td>
        <td class="th">Address</td>
        <td class="th">Route</td>
      </tr>
      <?php
      for ($i = 0; $i < $x; $i++) {
        echo '<tr id="tea" data-href-tea="">
                    <td>' . $data[$i]['user_id'] . '</td>
                    <td>' . $data[$i]['name'] . '</td>
                    <td>' . $data[$i]['no_of_estimated_containers'] . '</td>
                    <td>' . $data[$i]['address'] . '</td>
                    <td>' . $data[$i]['route_no'] . '</td>
                    
                </tr>';
      }
      ?>
    </table>
  </div>
  <div class="forms">
    <?php include 'teaCollection.php'; ?>      
  </div>
  <script src="<?php echo URL ?>vendors/js/supervisor/sweetalert2.all.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      if(<?php echo $x?> == '0'){
        console.log('zero landowners');
        $('#searchform').hide();
        $('#availabletable').hide();
        $('#unavailable_notice').show();
      }
      if(<?php echo $_SESSION['availability']?> == '0'){
        console.log('zero landowners');
        $('#searchform').hide();
        $('#availabletable').hide();
        $('#unavailable_notice').hide();
        $('#agent_unavailable_notice').show();
      }
      $('#myBtn').click(function(event) {
        event.preventDefault();
        var form = $('#teaUpdateForm').serializeArray();
        // form.push({name:'stock_type', value: 'in_stock'});
        // form.push({name:'type', value: 'fertilizer'});
        // // console.log(form);
        // $('.error').remove();
        var landownerId = $('#lid').val();
        var initialTeaWeight = $('#weight').val();
        // var priceForAmount = pricePerUnit*inAmount;
        var str = "<div style=\"display:flex; justify-content:center;\">" +
          "<div style=\"text-align:left;\">" +
          "<div>Landowner ID: <span style=\"color:#01830c;\"><b>" + landownerId + "</b></span></div>" +
          "<div>Intial Tea Weight :  <span style=\"color:#01830c;\"><b> " + initialTeaWeight + "kg</b></span></div>" +
          "</div>" +
          "</div>";
        console.log('lid' + landownerId);
        console.log('initialweight' + initialTeaWeight);
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
            $("#teaUpdateForm").trigger("reset");
            $.ajax({
              type: "POST",
              url: "<?php echo URL ?>agent/updateTeaWeight",
              cache: false,
              data: form,
              success: function(data) {
                Swal.fire({
                  icon: 'success',
                  title: 'Updated !',
                  text: 'Your file has been updated.',
                  confirmButtonColor: '#01830c'
                }).then((result) => {
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

  <!-- include 'popup.php';  -->

  <script>
    var table = document.getElementById('availabletable');
    
    //when a table row is clicked, the landowner gets autofilled in the form
    for (var i = 1; i < table.rows.length; i++) {
      table.rows[i].onclick = function() {
        //rIndex = this.rowIndex;
        document.getElementById("lid").value = this.cells[0].innerHTML;
      };
    }
    //search for a landowner
    function searchTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      table = document.getElementById("availabletable");
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