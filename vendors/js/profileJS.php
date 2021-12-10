<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
  $(document).ready(function() {
    function readURL(input) {
      if (input.files && input.files[0]) {
        var file = input.files[0];
        var fileType = file.type;
        var fileSize = file.size;
        var match = ["image/jpeg", "image/jpg", "image/png"];

        if (fileSize > 5000000) {
          $('#change_profile_sumbit_btn').hide();
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Sorry! File size Exceeds! ",
            // footer: '<a href="">Why do I have this issue?</a>'
          });
          return false;
        } else {
          return true;
        }
      }
      return false;
    }

    $("#imageUpload").change(function() {
      if (readURL(this)) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $("#imagePreview").css(
            "background-image",
            "url(" + e.target.result + ")"
          );
          $("#imagePreview").hide();
          $("#imagePreview").fadeIn(650);
        };
        $('#change_profile_sumbit_btn').show();
        reader.readAsDataURL(this.files[0]);
      }
    });
  });
</script>