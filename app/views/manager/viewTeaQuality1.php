<link rel="stylesheet" href="<?php echo URL ?>vendors/css/manager/viewTeaQuality1.css">

<div class="page" id="teapopup">
    <div class="title">
        VIEW TEA QUALITY
    </div>

    <div class="form">
        <div class="landowner-rate-outside" style="display: none; margin-top:40px;">
            <div class="landowner-rate" id="tea-rate">
                <!-- here replace the data comes form ajax -->
            </div>
        </div>
        <div class="inputfield" id="btnset">
            <button type="button" class="back" onclick="closeteaform()">Back</button>
        </div>
    </div>
</div>

<script>
    function closeteaform() {
        document.getElementById('teapopup').style.display = "none";
    }
</script>
<!-- onclick="openpopup()" -->