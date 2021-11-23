<script>
    $(document).ready(function() {
        $('#update_tea_btn').click(function(event) {
            event.preventDefault();
            var form = $('#update_tea_form').serializeArray();
            console.log(form);

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
                    $("#update_tea_form").trigger("reset");
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
                            $('#not_display_yet').hide();
                            $('#update_tea_table').append(data);
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