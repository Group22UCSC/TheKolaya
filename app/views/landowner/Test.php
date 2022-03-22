<?php include 'top-container.php'; ?>

<body onload="getTable();checkForm()"></body>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/setteaprice.css">




<!--  **********   view previous details   *** -->

<div class="previousDetails">
  <button onclick="previousPrices();scrollFunc();">Previous Tea Prices</button>
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
        <th class="thcls">Action</th>
      </tr>


    </table>
  </div>
</div>
<!-- <div id="priceForm" class="form-container">

    <div class="middleform">
        <form class="form-inline" action="#">
            <label for="year">Year:</label>
            <input type="text" id="year" placeholder="Year" name="year">
            <label for="month">Month:</label>
            <input type="text" id="month" placeholder="Month" name="month">
            <label for="price">Price:</label>
            <input type="text" id="price" placeholder="Price" name="price">

            <button type="submit">Submit</button>
        </form>
    </div>

</div> -->
<?php include 'js/accountant/setteapricejs.php"'; ?>
<script type="text/javascript" src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>