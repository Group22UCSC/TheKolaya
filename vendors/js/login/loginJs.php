<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        var inputField = $('#loginForm input');
        var user_id = '';
        var form = '';
        // console.log(options);
        var icon = $('#loginForm i');
        var url = "<?php echo URL ?>Login/controllCheckData";
        var noErrors = 0;

        var errors = {
            'mobile_number': '',
            'password': '',
        };

        function hasNumber(string) {
            return /\d/.test(string);
        }

        function showError(number, error) {
            inputField[number].value = '';
            inputField[number].placeholder = error;
            $(inputField[number]).removeClass('input-field input')
            $(inputField[number]).addClass('is-invalid');
            $(inputField[number].parentNode).addClass('is-invalid');
            if (number > 2) {
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
            if (number > 2) {
                number++;
                $(icon[number]).removeClass('is-invalid');
            } else {
                $(icon[number]).removeClass('is-invalid');
            }
        }

        function SerializeData() {
            form = $('#loginForm').serializeArray();
        }

        function isEmpty(number) {
            if (inputField[number].value.length == 0) {
                return true;
            } else {
                return false;
            }
        }

        //Validate The mobile
        function phonenumber(inputtxt) {
            var phoneno = /^\d*(?:\.\d{1,2})?$/;
            if (inputtxt.match(phoneno)) {
                return true;
            } else {
                return false;
            }
        }
        $(inputField[0]).change(function() {
            if (inputField[0].value.length > 10) {
                errors.mobile_number = "More than 10 charchters";
                showError(0, errors.mobile_number);
            } else if (!phonenumber(inputField[0].value)) {
                errors.mobile_number = "Can't include characters";
                showError(0, errors.mobile_number);
            } else if (inputField[0].value.length == 10 && phonenumber(inputField[0].value)) {
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
                            removeError(0);
                        } else if (responseText == 'Registered') {
                            errors.mobile_number = "Not Verified User";
                            showError(0, errors.mobile_number);
                        } else if (responseText == 'notRegistered') {
                            errors.mobile_number = "Not Registered User";
                            showError(0, errors.mobile_number);
                        }
                    }
                })
            } else {
                errors.mobile_number = '';
                removeError(0);
            }
            console.log(errors);
        });

        //validate the password
        $(inputField[1]).change(function() {
            if (inputField[1].value == '') {
                errors.password = "This must be filled !";
                showError(1, errors.password);
            } else if (errors.mobile_number == '') {
                SerializeData();
                form.push({
                    name: 'function_name',
                    value: 'login'
                });
                $.ajax({
                    url: url,
                    type: "POST",
                    data: form,
                    success: function(responseText) {
                        if (responseText == 'wrongPassword') {
                            errors.password = "Password is wrong!";
                            showError(1, errors.password);
                        } else {
                            removeError(1);
                        }
                    }
                });
            } else {
                errors.password = '';
                removeError(1);
            }
        });

        $('#login_btn').click(function(event) {
            SerializeData();
            var notFilled = 0;
            //Check is filled mobile number
            if (inputField[0].value.length < 10) {
                event.preventDefault();
                errors.mobile_number = "Less than 10 characters";
                showError(0, errors.mobile_number);
                notFilled = 1;
            }else if (inputField[0].value == '') {
                event.preventDefault();
                errors.mobile_number = "This is must filled";
                showError(0, errors.mobile_number);
                notFilled = 1;
            }
            //check is filled password
            if (inputField[1].value == '') {
                event.preventDefault();
                errors.password = "This is must filled";
                showError(1, errors.password);
                notFilled = 1;
            }

            // if(notFilled == 0) {
            //     form.push({
            //         name: 'function_name',
            //         value: 'nowLogin'
            //     });
            //     $.ajax({
            //         url: url,
            //         type: "POST",
            //         data: form,
            //         success: function(responseText) {
            //             if (responseText == 'wrongPassword') {
            //                 errors.password = "Password is wrong!";
            //                 showError(1, errors.password);
            //             } else {
            //                 removeError(1);
            //             }
            //         }
            //     });
            // }
        });
    });
</script>