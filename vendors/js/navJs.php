<script>
    //Notification pannel
    $(document).ready(function() {
        $(".profile .icon_wrap").click(function() {
            $(this).parent().toggleClass("active");
            $(".notifications").removeClass("active");
        });

        $(".notifications .icon_wrap").click(function() {
            $(this).parent().toggleClass("active");
            $(".profile").removeClass("active");
            var url = "<?php echo $_SESSION['user_type'] ?>/getNotification";
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

            var url = "<?php echo $_SESSION['user_type'] ?>/getNotification";
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