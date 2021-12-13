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

    <?php
    date_default_timezone_set("Asia/colombo");

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
          <input type="checkbox" class="input" class="btn" id="update_availability" name="availability" <?php if ($data[0]["tea_availability"] == 1 && ($data[0]["no_of_estimated_containers"] != 0 || $data[0]["no_of_estimated_containers"] != null)) {
                                                                                                          echo 'checked disabled';
                                                                                                        } ?>>
        </div>
      </div>
    </form>

  </div>
</div>

<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
  $(document).ready(function() {
    $('#update_availability').click(function(event) {
      var form = $('#update_availability_form').serializeArray();
      // console.log($(this).val());

      Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#01830c',
        cancelButtonColor: '#FF2400',
        confirmButtonText: 'Yes, Update it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#update_availability_form').trigger('reset');
          $.ajax({
            type: 'POST',
            url: '<?php echo URL?>landowner/Update_Tea_Availability',
            cache: false,
            data: form,
            success: function(data) {
              Swal.fire({
                icon: 'success',
                title: 'Updated !',
                text: 'Your file has been updated.',
                confirmButtonColor: '#01830c'
              }).then(() => {
                location.reload();
              })
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
        } else {
          $('#update_availability_form').trigger('reset');
        }
      })
    })
  })
</script>


<?php include 'bottom-container.php'; ?>