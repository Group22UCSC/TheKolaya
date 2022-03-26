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

    function sweetAlertPopup(message, titleMessage, textMessage, confirmBtn, cancelBtn) {
        return Swal.fire({
            html: message,
            title: titleMessage,
            text: textMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#01830c',
            cancelButtonColor: '#FF2400',
            confirmButtonText: confirmBtn,
            cancelButtonText: cancelBtn
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

    function getNotificationId(notiId, type) {
        notiId = notiId.id;
        notiId = String(notiId);
        notiId = notiId.match(/\d+/g);
        notiId = String(notiId);
        return notiId;
    }

    function getNotificationMessage(notiId, type) {
        notiId = notiId.id;
        notiId = String(notiId);
        var messageDiv = "#" + notiId + " ." + type;
        return messageDiv;
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
        var messageDiv = "";

        if ($(notificationId).hasClass('profCont')) {
            notificationId = notificationId.parentNode;
        }
        if ($(notificationId).hasClass('emergency')) {
            messageDiv = getNotificationMessage(notificationId, "emergency");
            notificationId = getNotificationId(notificationId);
            var message = $(messageDiv).html();
            var routeNumber = getRouteFromNotification(message);

            // console.log(routeNumber);

            $.ajax({
                url: "<?php echo URL ?>Manager/isAssigned",
                type: "POST",
                dataType: "JSON",
                data: "route_number=" + routeNumber,
                success: function(response) {
                    // console.log(response);
                    if (!response) {
                        popup.message = "Are you Sure to request from agents to assign to the <b>Route Number " + routeNumber + "</b>?";
                        popup.confirmBtn = 'Accept';
                        popup.cancelBtn = 'Decline';
                        sweetAlertPopup(popup.message, popup.titleMessage, popup.textMessage, popup.confirmBtn, popup.cancelBtn).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "<?php echo URL ?>Manager/requestAssignRoute",
                                    type: "POST",
                                    data: "route_number=" + routeNumber,
                                    success: function() {
                                        sweetAlertSuccess().then(() => {
                                            location.reload();
                                        });
                                    }
                                });
                            }
                        });
                    }
                }
            })
        } else if ($(notificationId).hasClass('available_request')) {
            messageDiv = getNotificationMessage(notificationId, "available_request");
            notificationId = getNotificationId(notificationId);
            var message = $(messageDiv).html();
            var routeNumber = getRouteFromNotification(message);
            var notificationIsAccepted = '';
            // console.log(notificationId);
            $.ajax({
                url: "<?php echo URL ?>Manager/is_accepted",
                type: "POST",
                dataType: "JSON",
                data: "notification_id=" + notificationId,
                success: function(response) {
                    notificationIsAccepted = response['is_accepted'];
                    if (notificationIsAccepted == 0) {
                        makePopupDefault();
                        popup.message = "Are you Sure to available the agent of route <b>number " + routeNumber;
                        popup.confirmBtn = 'Accept';
                        popup.cancelBtn = 'Decline';
                        sweetAlertPopup(popup.message, popup.titleMessage, popup.textMessage, popup.confirmBtn, popup.cancelBtn).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "<?php echo URL ?>Manager/makeAgentAvailable",
                                    type: "POST",
                                    data: "notification_id=" + notificationId,
                                    success: function(response) {
                                        sweetAlertSuccess().then(() => {
                                            location.reload();
                                        });
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }
    });
</script>