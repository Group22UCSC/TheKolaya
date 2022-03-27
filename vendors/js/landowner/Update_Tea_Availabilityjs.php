<script>
    $(document).ready(function() {
        $('#update_availability').click(function(event) {
            var form = $('#update_availability_form').serializeArray();
            var numberOfContainers = form[0]['value'];
            var errorMessage = "";

            function showError(erroMessage, errorField) {
                $('#update_availability_form').trigger('reset');
                $(errorField).html(erroMessage);
            }

            function removeError(errorField) {
                errorMessage = "";
                $(errorField).html("");
            }

            function containsSpecialChars(str) {
                const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
                return specialChars.test(str);
            }
            $("#priceid").keydown(function() {
                removeError("#container_error");
            })
            if (numberOfContainers < 0) {
                errorMessage = "*Can't insert minus Value !";
                showError(errorMessage, "#container_error");
            } else if (isNaN(numberOfContainers)) {
                errorMessage = "*Can't contain characters !";
                showError(errorMessage, "#container_error");
            } else {
                removeError("#container_error");
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FF2400',
      cancelButtonColor: '#4DD101',
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
            }

        })
    })
</script>