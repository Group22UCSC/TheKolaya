<script>
    $(document).ready(function() {
        var inputField = $('#update_tea_form input');
        var errors = {
            landowner_id: '',
            initial_tea_weight: '',
        }
        var landowner_id = $(inputField[0]).serializeArray();
        landowner_id.push({
            name: 'isCollected',
            value: false
        });
        landowner_id.push({
            name: 'method_name',
            value: 'isCollected'
        });

        function showError(number, error) {
            inputField[number].value = '';
            inputField[number].placeholder = error;
            $(inputField[number]).addClass('is-invalid');
        }

        function removeError(number, error) {
            $(inputField[number]).removeClass('is-invalid');
            inputField[number].placeholder = error;
        }
        //validate Landowner Id
        $(inputField[0]).change(function() {
            var tempLandId = $(this).serializeArray();
            landowner_id[0]['value'] = tempLandId[0]['value'];
            landowner_id[1]['value'] = false;
            // console.log(landowner_id)
            if (landowner_id[0]['value'] != '') {
                $.ajax({
                    url: "<?php echo URL ?>Supervisor/updateTeaMeasure",
                    type: "POST",
                    data: landowner_id,
                    success: function(data) {
                        // console.log(data);

                        if (data == "false") {
                            landowner_id[1]['value'] = false;
                            errors.landowner_id = "Not Collected!";
                            showError(0, errors.landowner_id);
                        } else if (data == 'true') {
                            landowner_id[1]['value'] = true;
                            errors.landowner_id = "";
                            removeError(0, errors.landowner_id);
                        } else if (data == 'updated') {
                            landowner_id[1]['value'] = false;
                            // console.log(landowner_id);

                            errors.landowner_id = "Already Updated!";
                            showError(0, errors.landowner_id);
                        }
                    }
                })
            }
        });

        $(inputField[0]).click(function() {
            $.ajax({
                url: "<?php echo URL ?>Supervisor/updateTeaMeasure",
                type: "POST",
                data: "method_name=getLandownerId",
                dataType: "JSON",
                success: function(data) {
                    inputField[0].value = data[0]['lid'];
                    landowner_id[1]['value'] = true;
                }
            })
        });
        // console.log(inputField);
        $('#update_tea_btn').click(function(event) {
            event.preventDefault();
            var form = $('#update_tea_form').serializeArray();
            // console.log(form);
            // console.log(landowner_id);
            if (form[0]['value'] && form[1]['value']) {
                Swal.fire({
                    title: 'Are you sure?',
                    // html: '<div>' + str + '</div>',
                    // text: "hello",
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
                                // console.log(data);
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
            }
        })
    })
</script>