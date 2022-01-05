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
                        console.log(responseText);
                    }
                })
                openteaform();
            });
        });
    });




    function openteaform() {
        document.getElementById("teapopup").style.display = "block";
        // document.getElementById("overlay").style.display = "block";
        //console.log("before blur");
        // var blur = document.getElementById('blur');
        // blur.classList.toggle('active');
        //console.log("after blur");
    }

    function closeteaform() {
        document.getElementById("teapopup").style.display = "none";
        // document.getElementById("overlay").style.display = "none";
        //console.log("before blur back");
        // var blur = document.getElementById('blur');
        // blur.classList.toggle('closeblur');
        //console.log("after blur back");
    }
</script>