<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/deleteAdvanceRequests.css">

<body onload="getTable();">

</body>
<!-- **************   Table container   *********-->
<div class="top-container">
    <p>Delete Advance Request</p>
</div>


<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable" id="teapricetable">

            <tr class="trcls">
                <th class="thcls">Requests Id</th>
                <th class="thcls">Received date</th>
                <th class="thcls">Received Time</th>
                <th class="thcls">Requests Type</th>
                <th class="thcls">Amount(Rs)</th>
                <th class="thcls">Response</th>
            </tr>


        </table>
    </div>

</div>
<div class="backButton">
    <a href="<?php echo URL ?>landowner/Make_Requests"> <button onclick="previousPrices();"><i class="fas fa-hand-point-left"></i> Make Requests</button>
</div>

<?php include 'js/landowner/deleteAdvanceRequestsjs.php'; ?>
<script type="text/javascript" src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>