<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        var inputField = $('#registration_form input');
        var selectField = $('#registration_form select');
        var options = $('#registration_form option');
        var user_id = '';
        var form = '';

        // console.log(options);
        console.log(inputField)
        var icon = $('#registration_form i');
        var url = "<?php echo URL ?>Registration/controllCheckData";
        var noErrors = 0;

        var placeHolderNames = ['name*', 'mobile number*', 'user id*', 'address*', 'password*', 'confirm password*']
        var errors = {
            'name': '',
            'mobile_number': '',
            'user_type': '',
            'user_id': '',
            'address': '',
            'password': '',
            'confirm_password': ''
        };

        // $(inputField[0]).hover() = "Enter your name";
        function hasNumber(string) {
            return /\d/.test(string);
        }

        function showError(number, error) {
            inputField[number].value = '';
            inputField[number].placeholder = error;
            $(inputField[number]).removeClass('input-field input')
            $(inputField[number]).addClass('is-invalid');
            $(inputField[number].parentNode).addClass('is-invalid');
            if (number >= 2) {
                number++;
                $(icon[number]).addClass('is-invalid');
            } else {
                $(icon[number]).addClass('is-invalid');
            }
        }

        function removeError(number) {
            SerializeData();
            $(inputField[number]).removeClass('is-invalid');
            $(inputField[number].parentNode).removeClass('is-invalid');
            inputField[number].placeholder = placeHolderNames[number]
            if (number > 2) {
                number++;
                $(icon[number]).removeClass('is-invalid');
            } else {
                $(icon[number]).removeClass('is-invalid');
            }
        }

        function SerializeData() {
            form = $('#registration_form').serializeArray();
        }

        function isEmpty(number) {
            if (inputField[number].value.length == 0) {
                return true;
            } else {
                return false;
            }
        }

        //Validate The Name
        $(inputField[0]).change(function() {
            if (hasNumber(inputField[0].value)) {
                errors.name = "The name Can't contain Numbers";
                showError(0, errors.name);
            } else if (isEmpty(0)) {
                errors.name = "The must be filled";
                console.log('hi')
                showError(0, errors.name);
            } else {
                errors.name = '';
                removeError(0);
            }
        });

        $(inputField[0]).keypress(function() {
            removeError(0);
        })

        //Validate The mobile
        function phonenumber(inputtxt) {
            var phoneno = /^\d*(?:\.\d{1,2})?$/;
            if (inputtxt.match(phoneno)) {
                return true;
            } else {
                return false;
            }
        }
        $(inputField[1]).change(function() {
            if (inputField[1].value.length > 10) {
                errors.mobile_number = "More than 10 charcters";
                showError(1, errors.mobile_number);
            } else if (isEmpty(1)) {
                showError(1);
            } else if (!phonenumber(inputField[1].value)) {
                errors.mobile_number = "Can't include characters";
                showError(1, errors.mobile_number);
            }  else if (inputField[1].value >= 10 && phonenumber(inputField[1].value)) {
                SerializeData();
                form.push({
                    name: 'function_name',
                    value: 'checkUser'
                });
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form,
                    success: function(responseText) {
                        if (responseText == 'Verified') {
                            console.log('verified');
                            errors.mobile_number = "Mobile Numuber is already Taken";
                            showError(1, errors.mobile_number);
                        } else if (responseText == 'notRegistered') {
                            errors.mobile_number = "Not Registered Mobile Number";
                            showError(1, errors.mobile_number);
                        } else {
                            inputField[2].value = responseText;
                            $(inputField[2]).attr('readonly', 'readonly');
                            removeError(1);
                        }
                        // console.log(form);
                    }
                })
            } else {
                errors.mobile_number = '';
                removeError(1);
            }
            // console.log(errors);
        });

        $(inputField[1]).keypress(function() {
            removeError(1);
        })

        //Validate the address
        $(inputField[3]).keypress(function() {
            removeError(3);
        })

        //Validate the password
        $(inputField[4]).keypress(function() {
            removeError(4);
        })

        //validate the confirm password
        $(inputField[5]).change(function() {
            if (inputField[5].value != inputField[4].value) {
                errors.confirm_password = "Confirmation Wrong !";
                showError(5, errors.confirm_password);
            } else {
                errors.confirm_password = '';
                removeError(5);
            }
        });
        $(inputField[5]).keypress(function() {
            removeError(5);
        })

        // console.log(inputField);

        function hasError(input) {
            if (input == '') {
                noErrors = 0;
                return true;
            } else {
                noErrors++;
                return false;
            }
        }

        $('#registrationBtn').click(function(event) {
            event.preventDefault();
            if (inputField[1].value.length < 10) {
                errors.mobile_number = "Less than 10 characters";
                showError(1, errors.mobile_number);
            }
            SerializeData();
            for (var i = 0; i < form.length; i++) {
                if (hasError(form[i]['value'])) {
                    switch (i) {
                        case 0:
                            errors.name = "This is must filled";
                            showError(0, errors.name);
                            break;
                        case 1:
                            errors.mobile_number = "This is must filled";
                            showError(1, errors.mobile_number);
                            break;
                        // case 2:
                        //     errors.user_type = "This is must filled";
                        //     showError(2, errors.user_type);
                        //     break;
                        case 3:
                            errors.user_id = "This is must filled";
                            showError(2, errors.user_id);
                            break;
                        case 4:
                            errors.address = "This is must filled";
                            showError(3, errors.address);
                            break;
                        case 5:
                            errors.password = "This is must filled";
                            showError(4, errors.password);
                            break;
                        case 6:
                            errors.confirm_password = "This is must filled";
                            showError(5, errors.confirm_password);
                            break;
                    }
                }
            }
            if (noErrors == 7) {
                form.push({
                    name: 'function_name',
                    value: 'registration'
                });
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL ?>Registration/controllCheckData",
                    data: form,
                    success: function(data) {
                        // console.log('success');
                        // console.log(form);
                        console.log('data' + data);
                        Swal.fire(
                            'Validated!',
                            'To login you have to verify your account',
                            'success'
                        ).then((result) => {
                            location.replace("<?php echo URL ?>OtpVerify");
                            console.log("Swal called");
                        });
                    }
                });
            }
            console.log(noErrors);
        });
    });
</script>