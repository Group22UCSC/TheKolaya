<?php include 'top-container.php'; ?>
<!-- Top container -->
<body onload="loadPid();getTable();"></body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/updateAuction.css">

<div class="top-container" >
    <p>Update Auction Details</p>
</div>



<!--  *** Update tea price box **** -->
<div class="wrapperdiv">
<div class="wrapperform">
    <!-- <div class="title">
           Emergency Message
        </div>         -->
    
    <div class="form">
    <form action="<?php echo URL?>productmanager/updateAuction" id="auctionForm">
    <div class="inputfield">
        
            <label for="productName">Product Name</label>
            <select id="productName" class="input" name="productName"  onchange="loadPid();" >
            <?php 
            foreach($data2 as $row){
                ?>
                <option value="<?php echo $row['product_id'];?>"><?php echo $row['product_name'];?></option>
            }
           <?php
            }
            ?>
            </select>
            <!-- <input type="text" class="input" id="productName"> -->
        </div>

      
        <div class="inputfield">
           
            <label for="pid">Product Id</label>
            <!-- <input list="browsers"> -->
            <input type="text" class="input" readonly id="pid" name="pid">
             
        </div>

        
        <div class="inputfield">
            <label for="amount" >Amount(Kg)</label>
            <input type="text" class="input" id="amount" required name="amount">
        </div>
        <div class="inputfield">
            <label for="price" >Price Per Kilo(Rs)</label>
            <input type="text" class="input" id="price" required name="price">
        </div>
        <div class="inputfield">
            <label for="buyer">Buyer</label>
            <!-- <input list="browsers"> -->
            <select id="buyer" class="input" name="buyer" onchange="loadBid()">
            <?php 
            foreach($data3 as $row){
                ?>
                <option value="<?php echo $row['buyer_id'];?>"><?php echo $row['name'];?></option>
            }
           <?php
            }
            ?>
            </select>
        </div>
        <div>
            <input type="text" id="bid" hidden name="bid">
        </div>
        <div class="inputfield">
            <!-- <input type="button" value="Update" data-modal-target="#modal" class="btn" id="updateBtn" > -->
            <input type="submit" value="Update"  class="btn" id="updateBtn" >
        </div>
        </form>
    </div>
</div>
</div>


<div class="tableTopic" >
    <p>Latest Auction Updates</p>
</div>


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


<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>

<?php include 'js/productmanager/updateAuctionjs.php';?>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>
