<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<!-- <script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('ef64da0120ca27fe19a3', {
        cluster: 'ap1'
    });
    var userType = '<?php echo $_SESSION['user_type']?>';
    switch (userType) {
        case 'Supervisor':
            var channel = pusher.subscribe('my-channel');
            channel.bind('today_collection_table', function(data) {
                $.ajax({
                    url: "<?php echo URL ?>Supervisor/getNotification",
                    success: function(result) {
                        $('#not_display_collection_yet').hide();
                        $('#today_collection_table').append(result);
                    }
                });
            });
            break;
    }

</script> -->