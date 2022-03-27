<script>
    $(document).ready(function() {
        var inputField = $('#update_tea_form input');
        var errors = {
            landowner_id: '',
            initial_tea_weight: '',
            water: '',
            mature_leaves: '',
            container: ''
        }

        var landowner_id = $(inputField[0]).serializeArray();
        landowner_id.push({
            name: 'isCollected',
            value: false
        });

        function showError(number, error) {
            inputField[number].value = '';
            inputField[number].placeholder = error;
            $(inputField[number]).addClass('is-invalid');
        }

        function removeError(number, placeholder="") {
            $(inputField[number]).removeClass('is-invalid');
            inputField[number].placeholder = placeholder;
        }

        $(inputField[0]).keydown(function(){
            removeError(0);
        })
        $(inputField[1]).keydown(function(){
            removeError(1);
        })
        $(inputField[2]).keydown(function(){
            removeError(2, "Water");
        })
        $(inputField[3]).keydown(function(){
            removeError(3, "Mature Leaves");
        })
        $(inputField[4]).keydown(function(){
            removeError(5, "Container");
        })
        //validate Landowner Id
        $(inputField[0]).change(function() {
            var tempLandId = $(this).serializeArray();
            landowner_id[0]['value'] = tempLandId[0]['value'];
            landowner_id[1]['value'] = false;
            if (landowner_id[0]['value'] != '') {
                $.ajax({
                    url: "<?php echo URL ?>Supervisor/updateTeaMeasure",
                    type: "POST",
                    data: landowner_id,
                    success: function(data) {
                        if (data == "false") {
                            landowner_id[1]['value'] = false;
                            errors.landowner_id = "Not Collected!";
                            showError(0, errors.landowner_id);
                        } else if (data == 'true') {
                            landowner_id[1]['value'] = true;
                            errors.landowner_id = "";
                            removeError(0);
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

        //Update automatically landowner Id
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
        $('#update_tea_btn').click(function(event) {
            event.preventDefault();
            var form = $('#update_tea_form').serializeArray();
            // console.log(inputField); 
            //validate the intial Weight
            if ($(inputField[1]).val() < 0) {
                errors.initial_tea_weight = "Can't insert minus values!";
                showError(1, errors.initial_tea_weight)
            } else if ($(inputField[1]).val() == 0) {
                errors.initial_tea_weight = "This must be filled!";
                showError(1, errors.initial_tea_weight)
            } else {
                errors.initial_tea_weight = "";
                removeError(1)
            }


            //Validate reductions
            if ($(inputField[2]).val() < 0) {
                errors.water = "Can't insert minus values!";
                showError(2, errors.water)
            } else {
                errors.water = "";
                removeError(2, "water")
            }

            if ($(inputField[3]).val() < 0) {
                errors.mature_leaves = "Can't insert minus values!";
                showError(3, errors.mature_leaves)
            } else {
                errors.mature_leaves = "";
                removeError(3, "Mature Leaves")
            }

            if ($(inputField[4]).val() < 0) {
                errors.container = "Can't insert minus values!";
                showError(4, errors.container)
            } else {
                errors.container = "";
                removeError(4, "Container")
            }

            form.push({
                name: 'isCollected',
                value: true
            });
            if (errors.landowner_id == "" && errors.initial_tea_weight == "" && errors.container == "" && errors.mature_leaves == "" && errors.water == "" ) {
                Swal.fire({
                    title: 'Are you sure?',
                    // html: '<div>' + str + '</div>',
                    // text: "Price Per Unit: "+form[0]['value']+" "+"Amount: "+form[1]['value']+" "+"Price For Amount: "+priceForAmount,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#01830c',
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
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated !',
                                    text: 'Your file has been updated.',
                                    confirmButtonColor: '#01830c'
                                }).then(() => {
                                    //Update automatically landowner Id
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
                                })
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