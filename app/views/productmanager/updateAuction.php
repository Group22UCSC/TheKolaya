<?php include 'top-container.php'; ?>
<!-- Top container -->
<body onload="loadPid();"></body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/updateAuction.css">
<script defer src="<?php echo URL ?>vendors/js/productmanager/updateAuction.js""></script>

<!-- Ajex for select oprtions in the form ex: Product id selection -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="<?php echo URL ?>vendors/js/sweetalert.min.js"></script> 
<script>
    
    
</script>
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
            <select id="productName" class="input" name="productName"  onchange="loadPid();loadModalName(this);" >
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
            <input type="text" class="input" readonly id="pid">
                
            </select>
        </div>

        
        <div class="inputfield">
            <label for="amount" >Amount(Kg)</label>
            <input type="text" class="input" id="amount" required>
        </div>
        <div class="inputfield">
            <label for="price" >Price Per Kilo(Rs)</label>
            <input type="text" class="input" id="price" required>
        </div>
        <div class="inputfield">
            <label for="buyer">Buyer</label>
            <!-- <input list="browsers"> -->
            <select id="buyer" class="input" name="buyer">
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
            
        <div class="inputfield">
            <input type="submit" value="Update" data-modal-target="#modal" class="btn" onsubmit="return validate()" >
        </div>
    </div>
</div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
<form action="<?php echo URL?>productmanager/updateAuction" method="post">
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Update Confirmation</div>
      <a data-close-button class="close-button"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
    </div>
    <div class="modal-body">
        <div class="year">
            <label>Product Name : </label> 
            <input type="text" class="modalInput" id="modalName" required readonly>
        </div>
        <div class="year">
            <label>Product Id :</label>
            <input type="text" class="modalInput" id="modalPid"  readonly required name="pid">
        </div>
        <div class="year">
            <label>Amount(Kg):</label>
            <input type="text" class="modalInput" id="modalAmount"  readonly required name="amount">
        </div>
        <div class="year">
            <label>Price(1kg/Rs):</label>
            <input type="text" class="modalInput" id="modalPrice"  readonly required  name="price"> 
        </div>
        <div class="year">
            <label>Buyer:</label>
            <input type="text" class="modalInput" id="modalBuyer" required readonly>
        </div>
        <div>
            <input type="text" id="modalBid" hidden name="bid">
        </div>
        <div class="buttonSection">
        <a class="editbtn" data-close-button>Cancel</a>
        
        <input type="submit" value="Confirm" class="confirmbtn" >
        
        
        
        </div>
    </div>
  </div>
  <div id="overlay"></div>
  </form>
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
                    <th class="thcls">Action</th>

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
                    <td class="tdcls">No Action</td>
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
