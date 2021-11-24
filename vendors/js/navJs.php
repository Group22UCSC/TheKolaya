<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('ef64da0120ca27fe19a3', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('request_notification', function(data) {
        var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotificationCount";
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: "notification_type=none",
            success: function(data) {
                var myHtml = "<p><?php echo $_SESSION['NotSeenCount']?></p>";
                $('#notification_count').html(myHtml);
                console.log(data);
            }
        });
    });
</script>


<script>
    //Notification pannel
    $(document).ready(function() {
        var x = 0;
        $(".profile .icon_wrap").click(function() {
            $('.profile_dd').slideToggle();
            $('.box').hide();
        });

        $(".notification_bell").click(function() {
            if ($('.box').css("display") == 'none') {
                x = 0;
            } else {
                x = 1;
            }
            $('.box').slideToggle();
            $(".profile_dd").hide();
            var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
            $.ajax({
                url: url,
                type: 'POST',
                data: "notification_type=half",
                success: function(responseText) {
                    var parser = new DOMParser();
                    var xmlDoc = parser.parseFromString(responseText, "text/html");
                    var myHtml = xmlDoc.getElementById("all_notifications").innerHTML;
                    $('#get_nofication').html(myHtml);
                    myHtml = xmlDoc.querySelector("p").innerHTML;
                    if (x == 1) {
                        $('#notification_count').html(myHtml);
                        x = 0;
                    }
                    // console.log(responseText);
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