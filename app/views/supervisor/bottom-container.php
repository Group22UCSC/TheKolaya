</section>

<script src="<?php echo URL ?>vendors/js/app.js"></script>
<?php include 'js/navJs.php' ?>
<script>
    $(".notiBox").click(function(event) {
        var notificationId = event.target.parentNode;
        var messageDiv = "";

        if ($(notificationId).hasClass('profCont')) {
            notificationId = notificationId.parentNode;
        }
        if ($(notificationId).hasClass('request')) {
            window.location.href = "<?php echo URL?>Supervisor/manageRequests";
        }
    })
</script>
</body>

</html>