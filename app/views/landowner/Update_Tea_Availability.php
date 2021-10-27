<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Update_Tea_Availability.css">
<!-- <script defer src="<?php echo URL ?>vendors/js/Landowner/Update_Tea_Availability.js"></script> -->
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="top-container">
  <p>Update Tea Availability</p>
</div>
<!--  *** Update tea price box **** -->

<div class="wrapperdiv">
  <div class="wrapperform">
    <!-- <div class="title">
    Emergency Message
  </div> -->

    <?php
    date_default_timezone_set("Asia/colombo");
    // $dateToday = date("Y-m-d");
    // $year = date('Y', strtotime($dateToday));
    // $month = date('F', strtotime($dateToday));
    // //print_r($data);
    // $y = count($data);
    // $isPriceSet = 0;
    // for ($j = 0; $j < $y; $j++) {
    //   $dbdate = $data[$j]['date'];
    //   $dbyear = date('Y', strtotime($dbdate));
    //   $dbmonth = date('F', strtotime($dbdate));
    //   if ($year == $dbyear and $month == $dbmonth) {
    //     $isPriceSet = 1;
    //   }
    // }

    ?>
    <form action="" method="POST" id="update_availability_form">
      <div class="form">
        <div class="inputfield">
          <label>Date</label>
          <input type="text" class="input" value="<?php echo date("Y-m-d") ?>" readonly>
        </div>
        <div class="inputfield">
          <label>Time</label>
          <input type="text" class="input" value="<?php echo date("h : i a") ?>" readonly>
        </div>

        <div class="inputfield">
          <label>No. of Containers Available</label>
          <input type="number" id="priceid" class="input" name="containers" required>
        </div>

        <div class="inputfield">
          <label>Update Availability</label>
          <input type="checkbox" class="input" class="btn" id="update_availability" name="availability">
        </div>
      </div>
    </form>

  </div>
</div>

<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
  <?php if($data[0]["tea_availability"] == 0){
    echo "$(document).ready(function() {
      $('#update_availability').click(function(event) {
        var form = $('#update_availability_form').serializeArray();
  
        // console.log($(this).val());
          Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4DD101',
            cancelButtonColor: '#FF2400',
            confirmButtonText: 'Yes, Update it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $('#update_availability_form').trigger('reset');
              $.ajax({
                type: 'POST',
                url: 'http://localhost/Thekolaya/landowner/Update_Tea_Availability',
                cache: false,
                data: form,
                success: function(data) {
                  Swal.fire(
                    'Updated!',
                    'Your file has been updated.',
                    'success'
                  )
                  // console.log(data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                  })
                }
              })
            }
          })
      })
    })";
  }?>
  
</script>


<?php include 'bottom-container.php'; ?>