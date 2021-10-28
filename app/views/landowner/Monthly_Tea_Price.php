<?php include 'top-container.php'; ?>

<body onload="getTable();checkForm()"></body>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Monthly_Tea_Price.css">

<div class="top-container">
    <p>Monthly Tea Price</p>
</div>



<!-- **************   Table container   *********-->
<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable" id="teapricetable">

            <tr class="trcls">
                <th class="thcls">Updated On</th>
                <th class="thcls">Year</th>
                <th class="thcls">Month</th>
                <th class="thcls">Price(Rs)</th>
            </tr>


        </table>
    </div>
</div>

<?php include 'js/landowner/Monthly_Tea_Pricejs.php"'; ?>
<script type="text/javascript" src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>