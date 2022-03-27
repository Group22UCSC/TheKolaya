<script>
    $(document).ready(function() {
        $('#deleteAccountBtn').click(function(event) {
            event.preventDefault();
            var form = $('#deleteForm').serializeArray();
            // var user_id=document.getElementById("id").val;

            var str = "Delete details set on ?";

            Swal.fire({
                title: 'Are You Sure ?',
                icon: 'warning',
                //   html:'<div>Line0<br />Line1<br /></div>',
                html: '<pre>' + str + '</pre>',
                //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
                confirmButtonColor: '#4DD101',
                cancelButtonColor: '#FF2400',
                confirmButtonText: 'Delete!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#deleteteForm").trigger("reset");

                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL ?>Admin/deleteAccount",

                        data: form,
                        success: function(data) {
                            console.log(data);
                            Swal.fire(
                                'Deleted!',
                                'Your Record Was Deleted Succesfully.',
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                            // clearTable();
                            // getTable();
                            // checkForm();
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