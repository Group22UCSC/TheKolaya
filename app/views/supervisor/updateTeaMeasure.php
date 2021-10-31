<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/updateTeaMeasure-style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Update Net-Weight</h2>
  </div>
  <div class="middle-container">

    <div class="form-container-outside">
      <div class="form-container">
        <div class="title">
          Enter details
        </div>
        <form action="#" id="update_tea_form" method="POST">
          <div class="form">
            <div class="inputfield">
              <label>Landowner ID</label>
              <input type="text" class="input" name="landowner_id">
            </div>
            <div class="inputfield">
              <label>Initial Tea Weight</label>
              <input type="number" class="input" name="weight">
            </div>
            <div class="inputfield">
              <label>Reductions(kg)</label>
              <input type="number" class="input" placeholder="Water" name="water">
            </div>
            <div class="inputfield">
              <label></label>
              <input type="number" class="input" placeholder="Mature Leaves" name="mature_leaves">
            </div>
            <div class="inputfield">
              <label></label>
              <input type="number" class="input" placeholder="Container" name="container">
            </div>

            <div class="inputfield">
              <label id="tea-quality">Tea Quality</label>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="Better">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="Good">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="Average">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="Bad">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="Too Bad">1 star</label>
              </div>
            </div>
            <div class="inputfield">
              <input type="submit" value="Update" class="accept-btn" name="update" id="update_tea_btn">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="table-container">
      <div class="table-wrapper">
        <div class="table_header"><?php echo date("Y-M-d"); ?> - Updated Tea-Weight</div>
        <div class="table">

          <?php
          if (!empty($data)) {
            echo '<div class="row tabel-header">
                  <div class="cell">Landowner ID</div>
                  <div class="cell">Reductions(kg)</div>
                  <div class="cell">Net-Weight(kg)</div>
                  <div class="cell">Tea Quality</div>
                </div>';
            for ($i = 0; $i < count($data); $i++) {
              if ($data[$i]['quality'] <= 20) {
                $teaQuality = 'Too Bad';
              } else if ($data[$i]['quality'] > 20 && $data[$i]['quality'] <= 40) {
                $teaQuality = 'Bad';
              } else if ($data[$i]['quality'] > 40 && $data[$i]['quality'] <= 60) {
                $teaQuality = 'Average';
              } else if ($data[$i]['quality'] > 60 && $data[$i]['quality'] <= 80) {
                $teaQuality = 'Good';
              } else if ($data[$i]['quality'] > 80 && $data[$i]['quality'] <= 100) {
                $teaQuality = 'Excellent';
              }
              $reductions = $data[$i]['water_precentage'] + $data[$i]['container_precentage'] + $data[$i]['matured_precentage'];
              echo '<div class="row">
                          <div class="cell" data-title="Landowener Id">' . $data[$i]['lid'] . '</div>
                          <div class="cell" data-title="Reductions(kg)">' . $reductions . '</div>
                          <div class="cell" data-title="Net-Weight(kg)">5' . $data[$i]['net_weight'] . '</div>
                          <div class="cell" data-title="Tea Quality">' . $teaQuality . '</div>
                        </div>';
            }
          } else {
            echo '<div style="border-radius: 0px; margin-top:10px; color:red; background-color: white;" class="table_header" >There is no tea collection to update</div>';
          }

          ?>
          <div class="row"  id="update_tea_table"></div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php include 'script-included.php'; ?>
  <script>
    $(document).ready(function() {
      $('#update_tea_btn').click(function(event) {
        event.preventDefault();
        var form = $('#update_tea_form').serializeArray();
        console.log(form);
        // $('.error').remove();
        // var inAmount = $('#in_amount').val();
        // var pricePerUnit = $('#price_per_unit').val();
        // var priceForAmount = pricePerUnit * inAmount;
        // var str = "<div style=\"display:flex; justify-content:center;\">" +
        //   "<div style=\"text-align:left;\">" +
        //   "<div>Price Per Unit: <span style=\"color:#4DD101;\"><b>Rs. " + pricePerUnit + "</b></span></div>" +
        //   "<div>Amount :  <span style=\"color:#4DD101;\"><b> " + inAmount + "kg</b></span></div>" +
        //   "<div>Price For Amount:  <span style=\"color:#4DD101;\"><b>Rs. " + priceForAmount + "</b></span></div>" +
        //   "</div>" +
        //   "</div>";
        // if (inAmount == 0) {
        //   $('#in_amount').parent().after("<p class=\"error\">Please insert the amount</p>")
        // } else if (inAmount < 0) {
        //   $('#in_amount').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        // }
        // if (pricePerUnit < 0) {
        //   $('#price_per_unit').parent().after("<p class=\"error\">Can't Insert minus values</p>");
        // } else if (pricePerUnit == 0) {
        //   $('#price_per_unit').parent().after("<p class=\"error\">Please insert the price per unit</p>");
        // }

        // if (pricePerUnit <= 0 || inAmount <= 0) {
        //   return;
        // }
        Swal.fire({
          title: 'Are you sure?',
          // html: '<div>' + str + '</div>',
          text: "hello",
          // text: "Price Per Unit: "+form[0]['value']+" "+"Amount: "+form[1]['value']+" "+"Price For Amount: "+priceForAmount,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#4DD101',
          cancelButtonColor: '#FF2400',
          confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
          if (result.isConfirmed) {
            // $("#update_tea_form").trigger("reset");
            $.ajax({
              type: "POST",
              url: "<?php echo URL ?>Supervisor/updateTeaMeasure",
              cache: false,
              data: form,
              success: function(data) {
                Swal.fire(
                  'Updated!',
                  'Your file has been updated.',
                  'success'
                )
                $('#update_tea_table').html(data);
                console.log(data);
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
  <?php include 'bottom-container.php'; ?>