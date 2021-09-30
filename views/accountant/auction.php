<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/auction.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="top-container">
    <p>Auction Details</p>
</div>
<!--  Details Bar -->
<div class="home-content">
    <div class="overview-boxes">
      <div class="box">
        <div class="right-side">
          <div class="box-topic">Total Income </div>
          <div class="number">Rs.40,876</div>
          <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
            <span class="text">Last Month</span>
          </div>
        </div>
        <i class='bx bxs-cart-add cart one'></i>
      </div>
    </div>
</div>

<!-- ***************** search bar **************** -->
<div id="landownerdetails" class="form-container">


    <form class="search-form" action="#">
        <label for="pid">Product ID:</label>
        <input type="text" id="pid" placeholder="Enter Product Id" name="pid">
        <button type="submit">Search</button>
        <!-- <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button> -->
    </form>
</div>
<!-- ********************** Table container  ***********************-->
<div class="table-container">
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
<!-- <script>
                function loadLandowner() {
                   var x=document.getElementsByClassName('.barChartSection');  
                   
                   let btn=document.querySelector('button');
                    btn.addEventListener('click',()=>{
                        x.style.display='block';
                    })
                }
            </script> -->
<?php include 'bottom-container.php'; ?>