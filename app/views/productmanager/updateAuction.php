<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/updateProducts.css">
<script defer src="<?php echo URL ?>vendors/js/productmanager/updateProducts.js""></script>
<div class="top-container">
    <p>Update Auction Details</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapper">
    <!-- <div class="title">
           Emergency Message
        </div>         -->
    <div class="form">
        <div class="inputfield">
            <label for="pid">Product Id</label>
            <!-- <input list="browsers"> -->
            <select id="productIds" class="input">
                <option value="P001">P001</option>
                <option value="P002">P002</option>
                <option value="P003">P003</option>
                <option value="P004">P004</option>
                <option value="P005">P005</option>
            </select>
        </div>
        <div class="inputfield">
            <label for="productName">Product Name</label>
            <input type="text" class="input" id="productName">
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
                <option value="P001">Akbar Brothers</option>
                <option value="P002">Empire Teas Pvt Ltd</option>
                <option value="P003">Van Rees Ceylon Ltd</option>
                <option value="P004">ACRIL Holdings</option>
                <option value="P005">Abacus Tea Pvt</option>
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
<div class="table-container" id="pricetbl">
    <div class="table-section">
    <table class="teapricetable">
            
            <tr class="trcls">
                <th class="thcls">Date</th>
                <th class="thcls">Product Id</th>
                <th class="thcls">Product Name</th>
                <th class="thcls">Sold Amount(Kg)</th>
                <th class="thcls">Sold Price(Per 1Kg)</th>
                <th class="thcls">Buyer</th>
                <th class="thcls">Total Income(Rs)</th>


            </tr>
       



        <tr>
            <td class="tdcls">12/09/2021</td>
            <td class="tdcls">P23</td>
            <td class="tdcls">Green Tea</td>
            <td class="tdcls">456</td>
            <td class="tdcls">120</td>
            <td class="tdcls">Gohn Keels Pvt</td>
            <td class="tdcls">34,560</td>
        </tr>
        <tr>
            <td class="tdcls">12/09/2021</td>
            <td class="tdcls">P23</td>
            <td class="tdcls">Green Tea</td>
            <td class="tdcls">456</td>
            <td class="tdcls">120</td>
            <td class="tdcls">Akbhar Brothers Pvt</td>
            <td class="tdcls">34,560</td>
        </tr>
        <tr>
            <td class="tdcls">12/09/2021</td>
            <td class="tdcls">P23</td>
            <td class="tdcls">Green Tea</td>
            <td class="tdcls">456</td>
            <td class="tdcls">120</td>
            <td class="tdcls">Gohn Keels Pvt</td>
            <td class="tdcls">34,560</td>
        </tr>
        <tr>
            <td class="tdcls">12/09/2021</td>
            <td class="tdcls">P23</td>
            <td class="tdcls">Green Tea</td>
            <td class="tdcls">456</td>
            <td class="tdcls">120</td>
            <td class="tdcls">Gohn Keels Pvt</td>
            <td class="tdcls">34,560</td>
        </tr>
        <tr>
            <td class="tdcls">12/09/2021</td>
            <td class="tdcls">P23</td>
            <td class="tdcls">Green Tea</td>
            <td class="tdcls">456</td>
            <td class="tdcls">120</td>
            <td class="tdcls">Gohn Keels Pvt</td>
            <td class="tdcls">34,560</td>
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
<?php include 'bottom-container.php'; ?>