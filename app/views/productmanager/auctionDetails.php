<?php include 'top-container.php'; ?>
<body onload="getTable()">
    
</body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/auctionDetails.css">
<!-- Top content -->
<div class="top-container">
    <p>Auction Details</p>
</div>
<!--  Search bar -->

<div class="searchbar">
    <form class="search-form" action="#">
        <label for="lname">Date : </label>
        <input type="date" id="searchDate"  name="searchDate">
        <button type="submit">Search</button>
    </form>
</div>
<!--  Table COntent -->
<!-- **************   Table container   *********-->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable" id="updateAuctionTable">
                
                <tr class="trcls">
                    <th class="thcls">Date</th>
                    <th class="thcls">PId</th>
                    <th class="thcls">Product Name</th>
                    <th class="thcls">Sold Amount(Kg)</th>
                    <th class="thcls">Sold Price(1Kg/Rs)</th>
                    <th class="thcls">Buyer</th>
                    <th class="thcls">Income(Rs)</th>
                    <th class="thcls">Action</th>

                </tr>
                <!-- <tbody></tbody> -->
               <!--  OLD TABLE IS IN THE TRASH FILE -> TRASH.PHP -->
    
        </table>
    </div>


</div>
<?php include 'js/productmanager/auctionDetailsjs.php';?>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>

  <?php include 'bottom-container.php'; ?>