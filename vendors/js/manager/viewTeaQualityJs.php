<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href-tea]");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                var landownerId = row.children[1].innerHTML;
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL?>Manager/viewTeaQuality",
                    data: "landowner_id="+landownerId,
                    success: function(responseText) {
                        $("#tea-rate").html(responseText);
                    }
                })
                openteaform();
            });
        });
    });

    function openteaform() {
        document.getElementById("teapopup").style.display = "block";
    }

    function closeteaform() {
        document.getElementById("teapopup").style.display = "none";
    }
</script>