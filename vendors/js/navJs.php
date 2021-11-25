<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    //Pusher Api
    var pusher = new Pusher('ef64da0120ca27fe19a3', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('request_notification', function(data) {
        var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotificationCount";
        $.ajax({
            url: url,
            type: 'GET',
            data: "getCount=byAjax",
            success: function(data) {
                var myHtml = "<p>" + data + "</p>";
                $('#notification_count').html(myHtml);
                // console.log(data);
            }
        });
    });
</script>


<script>
    //Notification pannel
    $(document).ready(function() {
        var x = 0;
        var notificationAllBtn = $('#notification_all_btn');
        var unreadNotificationBtn = $('#notification_unread_btn');
        var notificationBell = $(".notification_bell");
        var navProfile = $(".profile .icon_wrap");
        var darkGreen = "#27ae60";
        var lightGreen = "#7cdd84";

        function changeNotificationBtn(color1, color2) {
            unreadNotificationBtn.css('background-color', color1);
            notificationAllBtn.css('background-color', color2);
            //All notification btn Color change
            notificationAllBtn.mouseover(500, function() {
                $(this).css('background-color', color1);
            });

            notificationAllBtn.mouseout(500, function() {
                $(this).css('background-color', color2);
            });

            //Unread notification btn Color change
            unreadNotificationBtn.mouseover(500, function() {
                $(this).css('background-color', color2);
            });

            unreadNotificationBtn.mouseout(500, function() {
                $(this).css('background-color', color1);
            });
        }

        function hoverIcon(clickBtn,color1, color2) {
            clickBtn.css('color', color2);
            clickBtn.mouseover(500, function() {
                clickBtn.css('color', color1);
            });

            clickBtn.mouseout(500, function() {
                clickBtn.css('color', color2);
            });
        }

        navProfile.click(function() {
            if($('.profile_dd').css("display") == 'none') {
                hoverIcon(navProfile, darkGreen, darkGreen);
            }else {
                hoverIcon(navProfile, darkGreen, 'black');
            }
            $('.profile_dd').slideToggle();
            $('.box').hide();

            hoverIcon(notificationBell, darkGreen, 'black');
        });

        notificationBell.click(function() {
            if ($('.box').css("display") == 'none') {
                x = 0;
                changeNotificationBtn(lightGreen, darkGreen);
                hoverIcon(notificationBell, darkGreen, darkGreen);
            } else {
                x = 1;
                hoverIcon(notificationBell, darkGreen, 'black');

            }

            $('.box').slideToggle();
            $(".profile_dd").hide();

            hoverIcon(navProfile, darkGreen, 'black');
            var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
            $.ajax({
                url: url,
                type: 'POST',
                data: "notification_type=full",
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

        unreadNotificationBtn.click(function() {
            changeNotificationBtn(darkGreen, lightGreen);

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

        notificationAllBtn.click(function() {
            changeNotificationBtn(lightGreen, darkGreen);
            var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
            $.ajax({
                url: url,
                type: 'POST',
                data: "notification_type=full",
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


        $(".box").click(function(event) {
            var notificationId = event.target.parentNode;
            if ($(notificationId).hasClass('profCont')) {
                notificationId = notificationId.parentNode;
            }
            notificationId = notificationId.id;
            notificationId = notificationId.match(/\d+/g);
            // console.log(notificationId);
            var url = "<?php echo URL . "/" . $_SESSION['user_type'] ?>/getNotification";
            $.ajax({
                url: url,
                type: 'POST',
                data: "notification_id=" + notificationId,
                success: function(data) {
                    // $('#get_all_nofication').html(data);
                }
            });
            // console.log(typeof(notificationId));
        });
    });
</script>