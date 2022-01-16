<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/auction.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="top-container">
    <p>Auction Details</p>
</div>
<!--  Details Bar -->


<!-- ***************** search bar **************** -->
<div id="landownerdetails" class="form-container">


    <form class="search-form" action="#">
        <label for="date">Date :</label>
        <input type="date" id="auctiondate" onkeyup="searchByDate()" placeholder="Select a date" name="date">
        <button type="button" onclick="searchByDate()">Search</button>
        <button type="button" onclick="clearDate()">Clear</button>
        <!-- <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button> -->
    </form>
</div>
<!-- ********************** Table container  ***********************-->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable" id="auctionDetailsTble">
            
                <tr class="trcls">
                    <th class="thcls">Date</th>
                    <th class="thcls">PId</th>
                    <th class="thcls">Product Name</th>
                    <th class="thcls">Sold Amount(Kg)</th>
                    <th class="thcls">Sold Price(1Kg/Rs)</th>
                    <th class="thcls">Buyer</th>
                    <th class="thcls">Income(Rs)</th>


                </tr>
           
                <?php
            $x = count($data);
            for($i = 0; $i < $x; $i++) {
            //   echo '<div class="table-row-2 get-id">
            //           <div class="table-element">'.$data[$i]['request_date'].'</div>
            //           <div class="table-element user-id">'.$data[$i]['lid'].'</div>
            //           <div class="table-element">'.$data[$i]['name'].'</div>
            //           <div class="table-element">'.$data[$i]['amount'].'</div>
            //         </div>';
            // auction.date,product.product_id, product.product_name, 
            // auction.sold_amount, auction.sold_price,buyer.name
                 echo'<tr>
                    <td class="tdcls">'.$data[$i]['date'].'</td>
                    <td class="tdcls">'.$data[$i]['product_id'].'</td>
                    <td class="tdcls">'.$data[$i]['product_name'].'</td>
                    <td class="tdcls">'.$data[$i]['sold_amount'].'</td>
                    <td class="tdcls">'.$data[$i]['sold_price'].'</td>
                    <td class="tdcls">'.$data[$i]['name'].'</td>
                    <td class="tdcls">'.$data[$i]['sold_amount']*$data[$i]['sold_price'].'</td>
                </tr>';
                    
            }
          ?>

    
        </table>
    </div>


</div>
<?php include 'js/accountant/auctionjs.php';?>
<?php include 'bottom-container.php'; ?>