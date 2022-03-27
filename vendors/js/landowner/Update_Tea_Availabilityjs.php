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
                        url: '<?php echo URL ?>landowner/Update_Tea_Availability',
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