<script>
    
    $(document).ready(function(){
        $('#updateAccountBtn').click(function(event) {
            event.preventDefault();
            var form = $('#updateForm').serializeArray();
             // var user_id=document.getElementById("id").val;

    var str="Update details set on ?";

    Swal.fire({
      title: 'Are You Sure ?',
      icon: 'warning',
    //   html:'<div>Line0<br />Line1<br /></div>',
    html: '<pre>' + str + '</pre>',
      //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
      confirmButtonColor: '#FF2400',
      cancelButtonColor: '#4DD101',
      confirmButtonText: 'Update!',
      showCancelButton: true
      }).then((result) => {
          if (result.isConfirmed) {
              $("#updateForm").trigger("reset");
              
              $.ajax({
                  type: "POST",
                  url: "<?php echo URL?>Admin/updateAccount",
                  
                  data: form,
                  success: function(data) {
                      console.log(data);
                      Swal.fire(
                      'Updated!',
                      'Your Record Was Updated Succesfully.',
                      'success'
                      ).then(() => {
                        location.reload();
                      })
                      // clearTable();
                      // getTable();
                      // checkForm();
                  },
                  error : function (xhr, ajaxOptions, thrownError) {
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