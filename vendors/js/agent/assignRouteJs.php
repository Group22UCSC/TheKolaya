<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
    var popup = {
        message: '',
        titleMessage: '',
        textMessage: '',
        confirmBtn: '',
        cancelBtn: '',
    }

    function makePopupDefault() {
        popup = {
            message: '',
            titleMessage: '',
            textMessage: '',
            confirmBtn: '',
            cancelBtn: '',
        }
    }

    function sweetAlertPopup(message, titleMessage, textMessage, confirm, cancel) {
        return Swal.fire({
            html: message,
            title: titleMessage,
            text: textMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#01830c',
            cancelButtonColor: '#FF2400',
            confirmButtonText: confirm,
            cancelButtonText: cancel
        })
    }

    function sweetAlertSuccess() {
        return Swal.fire({
            icon: 'success',
            title: 'Accepted !',
            text: 'Your Confirmation updated!',
            confirmButtonColor: '#01830c'
        });
    }

    //Get Route number from notification
    function getRouteFromNotification(str) {
        var matches = str.match(/(\d+)/);

        if (matches) {
            return matches[0];
        }
    }
    $(".notiBox").click(function(event) {
        var notificationId = event.target.parentNode;

        if ($(notificationId).hasClass('profCont')) {
            notificationId = notificationId.parentNode;
        }
        if ($(notificationId).hasClass('emergency')) {
            notificationId = notificationId.id;
            notificationId = String(notificationId);
            var messageDiv = "#" + notificationId + " .emergency";
            var isRejected = -1;
            notificationId = notificationId.match(/\d+/g);
            notificationId = String(notificationId);
            $.ajax({
                url: '<?php echo URL ?>Agent/isRejected',
                type: 'POST',
                dataType: 'JSON',
                data: "notification_id=" + notificationId,
                success: function(responseText) {
                    // console.log(responseText);
                    if (responseText['is_accepted'] == 0) {
                        makePopupDefault();
                        popup.message = $(messageDiv).html();
                        var assign_route = getRouteFromNotification(popup.message);
                        // console.log(assign_route);
                        popup.confirmBtn = 'Accept';
                        popup.cancelBtn = 'Decline';
                        sweetAlertPopup(popup.message, popup.titleMessage, popup.textMessage, popup.confirmBtn, popup.cancelBtn).then((result) => {
                            // console.log(result)
                            if (result.isConfirmed) {
                                makePopupDefault();
                                popup.titleMessage = 'Are You Sure to <b style="color:green">Accecpt?</b>';
                                popup.textMessage = 'You won\'t be able to revert this!';
                                popup.confirmBtn = 'Yes, Confirm';
                                popup.cancelBtn = 'Cancel';
                                sweetAlertPopup(popup.message, popup.titleMessage, popup.textMessage, popup.confirmBtn, popup.cancelBtn).then((result) => {
                                    if (result.isConfirmed) {
                                        isRejected = 0;
                                        $.ajax({
                                            url: "<?php echo URL ?>Agent/confirmRouteAssign",
                                            type: "POST",
                                            data: {
                                                isRejected: isRejected,
                                                assign_route: assign_route,
                                                notification_id: notificationId
                                            },
                                            success: function(data) {
                                                // console.log(data)
                                                sweetAlertSuccess().then(() => {
                                                    location.reload();
                                                });
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                                                    confirmButtonColor: '#FF2400'
                                                })
                                            }
                                        });
                                    }
                                })

                            } else if (result.dismiss == 'cancel') {
                                makePopupDefault();
                                popup.titleMessage = 'Are You Sure to <b style="color:red">Decline?</b>';
                                popup.textMessage = 'You won\'t be able to revert this!';
                                popup.confirmBtn = 'Yes, Confirm';
                                popup.cancelBtn = 'Cancel';
                                sweetAlertPopup(popup.message, popup.titleMessage, popup.textMessage, popup.confirmBtn, popup.cancelBtn).then((result) => {
                                    if (result.isConfirmed) {
                                        isRejected = 1;
                                        $.ajax({
                                            url: "<?php echo URL ?>Agent/confirmRouteAssign",
                                            type: "POST",
                                            data: {
                                                isRejected: isRejected,
                                                assign_route: assign_route,
                                                notification_id: notificationId
                                            },
                                            success: function(data) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Rejected',
                                                    text: 'Your Confirmation updated!',
                                                    confirmButtonColor: '#FF2400'
                                                });
                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                                                    confirmButtonColor: '#FF2400'
                                                })
                                            }
                                        });
                                    }
                                })
                            }
                        })
                    }
                }
            })
        }
    });
</script>