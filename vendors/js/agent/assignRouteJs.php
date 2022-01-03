<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script>
    $(".notiBox").click(function(event) {
        var notificationId = event.target.parentNode;

        if ($(notificationId).hasClass('profCont')) {
            notificationId = notificationId.parentNode;
        }
        if ($(notificationId).hasClass('emergency')) {
            notificationId = notificationId.id;
            notificationId = String(notificationId);
            var messageDiv = "#" + notificationId + " .emergency";
            var message = $(messageDiv).html();
            var isRejected = -1;

            $.ajax({
                url: '<?php echo URL ?>Agent/isRejected',
                type: 'POST',
                dataType: 'JSON',
                success: function(responseText) {
                    if (responseText[0]['is_rejected'] == -1) {
                        Swal.fire({
                            html: '<div>' + message + '</div>',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#01830c',
                            cancelButtonColor: '#FF2400',
                            confirmButtonText: 'Yes, Update it!'
                        }).then((result) => {
                            console.log(result)
                            if (result.isConfirmed) {
                                isRejected = 1;
                                $.ajax({
                                    url: "<?php echo URL ?>Agent/confirmRouteAssign",
                                    type: "POST",
                                    data: "isRejected=" + isRejected,
                                    success: function(data) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Accepted !',
                                            text: 'Your Confirmation updated!',
                                            confirmButtonColor: '#01830c'
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
                            } else if (result.dismiss == 'cancel') {
                                isRejected = 0;
                                $.ajax({
                                    url: "<?php echo URL ?>Agent/confirmRouteAssign",
                                    type: "POST",
                                    data: "isRejected=" + isRejected,
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
                }
            })


        }
    });
</script>