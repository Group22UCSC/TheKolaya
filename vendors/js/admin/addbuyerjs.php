<script>
    
    $(document).ready(function(){
        $('#addbuyerBtn').click(function(event) {
            event.preventDefault();
            var form = $('#buyerForm').serializeArray();
             // var user_id=document.getElementById("id").val;

    var str="buyer details set on ?";

    Swal.fire({
      title: 'Are You Sure ?',
      icon: 'warning',
    //   html:'<div>Line0<br />Line1<br /></div>',
    html: '<pre>' + str + '</pre>',
      //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
      confirmButtonColor: '#FF2400',
      cancelButtonColor: '#4DD101',
      confirmButtonText: 'Add buyer!',
      showCancelButton: true
      }).then((result) => {
          if (result.isConfirmed) {
              $("#buyerForm").trigger("reset");
              
              $.ajax({
                  type: "POST",
                  url: "<?php echo URL?>Admin/addbuyer",
                  
                  data: form,
                  success: function(data) {
                      console.log(data);
                      Swal.fire(
                      'New buyer added!',
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