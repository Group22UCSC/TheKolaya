<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/setteaprice.css">
<div class="middle-section">
    <div class="top-container">
        <div class="left"></div>
        <div class="middle">
            Monthly Tea Price
        </div>
        <div class="right"></div>
    </div>
</div>
<!-- Table container -->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Year</th>
                    <th class="thcls">Month</th>
                    <th class="thcls">Price(Rs)</th>
                    <th class="thcls">Status</th>

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
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">February</td>
                <td class="tdcls">129</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr>
            <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">March</td>
                <td class="tdcls">120</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr>
            <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">April</td>
                <td class="tdcls">125</td>
                <td class="tdcls">
                    <p class="status status-notupdated">Not Updated</p>
                </td>

            </tr>
            <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">May</td>
                <td class="tdcls">127</td>
                <td class="tdcls">
                    <p class="status status-pending">Pending</p>
                </td>

            </tr>
            </tr>

        </table>
    </div>
</div>
<div id="priceForm" class="form-container">
    
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
    
</div>
<?php include 'bottom-container.php'; ?>