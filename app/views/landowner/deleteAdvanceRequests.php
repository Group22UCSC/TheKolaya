<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/deleteAdvanceRequests.css">

<body onload="getTable();">

</body>
<!-- **************   Table container   *********-->
<h1>Advance</h1>
<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable" id="teapricetable">

            <tr class="trcls">
                <th class="thcls">Requests Id</th>
                <th class="thcls">Received date</th>
                <th class="thcls">Quntity</th>
                <th class="thcls">Response</th>
            </tr>


        </table>
    </div>
</div>

<?php include 'js/landowner/deleteAdvanceRequestsjs.php'; ?>

<?php include 'bottom-container.php'; ?>