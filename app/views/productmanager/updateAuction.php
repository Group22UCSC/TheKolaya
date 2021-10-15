<?php include 'top-container.php'; ?>
<!-- Top container -->
<body onload="loadPid()"></body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/updateAuction.css">
<script defer src="<?php echo URL ?>vendors/js/productmanager/updateProducts.js""></script>

<!-- Ajex for select oprtions in the form ex: Product id selection -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<div class="top-container" >
    <p>Update Auction Details</p>
</div>
<!--  *** Update tea price box **** -->

<div class="wrapperform">
    <!-- <div class="title">
           Emergency Message
        </div>         -->
    <div class="form">

    <div class="inputfield">
        <!-- <script>  
            $(document).ready(function(){  
                $('#productid').change(function(){  
                    var brand_id = $(this).val();  
                    $.ajax({  
                            url:"<?php echo URL?>productmanager/loadProductNames",  
                            method:"POST",  
                            data:{product_id:brand_id},  
                            success:function(data){  
                                $('#productName').html(data);  
                            }  
                    });  
                });  
            });  
        </script>   -->
            <label for="productName">Product Name</label>
            <select id="productName" class="input" name="productName"  onchange="loadPid()">
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

        <script>
            function loadPid(){
                var e = document.getElementById("productName");
                var val= e.options[e.selectedIndex].value;
                document.getElementById('pid').value=val;
            }
        </script>

        <div class="inputfield">
            
            <label for="pid">Product Id</label>
            <!-- <input list="browsers"> -->
            <input type="text" class="input" readonly id="pid">
                
            </select>
        </div>

        
        <div class="inputfield">
            <label for="amount" >Amount(Kg)</label>
            <input type="text" class="input" id="amount">
        </div>
        <div class="inputfield">
            <label for="price" >Price Per Kilo(Rs)</label>
            <input type="text" class="input" id="price">
        </div>
        <div class="inputfield">
            <label for="pid">Buyer</label>
            <!-- <input list="browsers"> -->
            <select id="productIds" class="input">
            <?php 
            
            print_r($data1);
            ?>
            </select>
        </div>
        <div class="inputfield">
            <input type="submit" value="Update" data-modal-target="#modal" class="btn">
        </div>
    </div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Update Confirmation</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
        <div class="year">
            <label>Product Id : P002</label>
        </div>
        <div class="month">
            <label>Product Name : B102-Green</label>
        </div>
        <div class="price">
            <label>Amount(Kg): 122</label>
        </div>
        <div class="buttonSection">
        <a class="editbtn" data-close-button>Cancel</a>
        
        <input type="submit" value="Confirm" class="confirmbtn" >
        
        
        
        </div>
    </div>
  </div>
  <div id="overlay"></div>

<!--  **********   view prouduct stock   *** -->

<!-- <div class="previousDetails">
    <button  onclick="previousPrices();scrollFunc();">View Updated Product List</button>
</div> -->

<script>
    function openModel(){

    }
    function previousPrices() {
        
        var val = document.getElementById("pricetbl").style.display;
        if (val == "none") {
            var val = document.getElementById("pricetbl").style.display = "grid";
            
        } else {
            var val = document.getElementById("pricetbl").style.display = "none";
        }
    }
    function scrollFunc(){

        window.scrollTo(0, 500);
    }
    // let scrollerID;
    //         let paused = true;
    //         let speed = 1; // 1 - Fast | 2 - Medium | 3 - Slow
    //         let interval = speed * 5;

    //         function startScroll() {
    //             let id = setInterval(function() {
    //                 window.scrollBy(0, 4);
    //                 if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    //                     // Reached end of page
    //                     stopScroll();
    //                 }
    //             }, interval);
    //             return id;
    //         }

    //         function stopScroll() {
    //             clearInterval(scrollerID);
    //         }

    //         // document.body.addEventListener('keypress', function(event) {
    //         //     if (event.which == 13 || event.keyCode == 13) {
    //                 // It's the 'Enter' key
    //                 if (paused == true) {
    //                     scrollerID = startScroll();
    //                     paused = false;
    //                 } else {
    //                     stopScroll();
    //                     paused = true;
    //                 }
                
    //         true;
</script>

<!-- **************   Table container   *********-->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable">
            
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
            $x = count($data1);
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
                    <td class="tdcls">'.$data1[$i]['date'].'</td>
                    <td class="tdcls">'.$data1[$i]['product_id'].'</td>
                    <td class="tdcls">'.$data1[$i]['product_name'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_amount'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_price'].'</td>
                    <td class="tdcls">'.$data1[$i]['name'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_amount']*$data1[$i]['sold_price'].'</td>
                </tr>';
                    
            }
          ?>

    
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
<?php include 'bottom-container.php'; ?>