<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('ef64da0120ca27fe19a3', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('request_notification', function(data) {
        var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
        $.ajax({
            url: url,
            type: 'POST',
            data: "notification_type=none",
            success: function(data) {
                $('.icon-button__badge').css("display", "block");
                $('.icon-button__badge').html(data);
                console.log(data);
            }
        });
    });
</script>


<script>
    //Notification pannel
    $(document).ready(function() {
        $(".profile .icon_wrap").click(function() {
            // $(this).parent().toggleClass("active");
            $('.profile_dd').slideToggle();
            $('.box').hide();
        });

        $(".notification_bell").click(function() {
            console.log('hi')
            // $('.box').toggleClass("active");
            $('.box').slideToggle();
            $('.box').addClass('active')
            $(".profile_dd").hide();
            var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
            $.ajax({
                url: url,
                type: 'POST',
                data: "notification_type=half",
                success: function(data) {
                    $('#get_nofication').html(data);
                }
            });
        });

        $(".show_all .link").click(function() {
            $(".notifications").removeClass("active");
            $(".popup").show();

            var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
            $.ajax({
                url: url,
                type: 'POST',
                data: "notification_type=all",
                success: function(data) {
                    $('#get_all_nofication').html(data);
                }
            });
        });

        $(".close").click(function() {
            $(".popup").hide();
        });
    });
</script>