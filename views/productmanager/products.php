<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/products.css">
<!-- Top content -->
<div class="top-container">
    <p>Product Stock Details</p>
</div>

 
  
 <!--  ******* search bar ********* -->
<div class="searchbar">
    <form class="search-form" action="#">
        <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button>
    </form>
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
            <tr>
                <td class="tdcls">12/10/2021</td>
                <td class="tdcls">P001</td>
                <td class="tdcls">B-345-Black-Tea</td>
                <td class="tdcls">234</td>
            </tr>
            
            

        </table>
    </div>
</div>

  <?php include 'bottom-container.php'; ?>