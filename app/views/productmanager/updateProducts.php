<?php include 'top-container.php'; ?>
<!-- Top container -->
<body onload="loadPid();"></body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/updateProducts.css">

<div class="top-container">
    <p>Update Products</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapperdiv">


<div class="wrapperform">
    <!-- <div class="title">
           Emergency Message
        </div>         -->
    <div class="form">
        <form action="<?php echo URL?>productmanager/updateProducts" id="productsForm">
        <div class="inputfield">
        <label for="productName">Product Name</label>
            <select id="productName" class="input" name="productName"  onchange="loadPid();loadModalName(this);" >
            <?php 
            foreach($data as $row){
                ?>
                <option value="<?php echo $row['product_id'];?>"><?php echo $row['product_name'];?></option>
            }
           <?php
            }
            ?>
            </select>
        </div>
        <div class="inputfield">
            <label for="pid">Product Id</label>
            <!-- <input list="browsers"> -->
            <input type="text" class="input" readonly id="pid">
        </div>
        <div class="inputfield">
            <label for="amount" >Amount(Kg)</label>
            <input type="number" class="input" id="amount">
        </div>
        <div class="inputfield">
            <input type="submit" value="Update" class="btn" id="updateBtn">
        </div>
        </form>
    </div>
</div>
</div>

<!-- **************   Table container   *********-->
<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Updated Date</th>
                    <th class="thcls">Pid</th>
                    <th class="thcls">Product Name</th>
                    <th class="thcls">Amount(Kg)</th>

                </tr>
            </thead>

            <!-- <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">January</td>
                <td class="tdcls">98</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr> -->


            <tr>
                <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr>
            <!-- <tr>
                <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr> -->
            <tr>
                 <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>

            </tr>
            <tr>
                 <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>
            
            </tr>
            <tr>
                 <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>
            </tr>
            <tr>
                <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>
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

<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>

<?php include 'js/productmanager/updateProductsjs.php';?>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>