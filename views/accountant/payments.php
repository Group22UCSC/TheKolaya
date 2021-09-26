<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/payments.css">
<div class="middle-section">
    <div class="top-container">
        <div class="left"></div>
        <div class="middle">
            Monthly Payments
        </div>
        <div class="right"></div>
    </div>
</div>
<!--  ******* search bar ********* -->
<div class="searchbar">
    <form class="search-form" action="#">
        <label for="lid">Landowner's ID:</label>
        <input type="text" id="lid" placeholder="Lid" name="lid">
        <button type="submit">Search</button>
        <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button>
    </form>
</div>
<!-- Table container -->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Year</th>
                    <th class="thcls">Month</th>
                    <th class="thcls">Lid(Rs)</th>
                    <th class="thcls">Income</th>
                    <th class="thcls">Fertilizer Expences</th>
                    <th class="thcls">Advance Expences</th>
                    <th class="thcls">Final Payment</th>
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

            <tbody>


                <tr>
                    <td class="tdcls"><a class="acls" href="#">2021</a></td>
                    <td class="tdcls">February</td>
                    <td class="tdcls">129</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <td class="tdcls">
                        <p class="status status-paid">Paid</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">2021</a></td>
                    <td class="tdcls">March</td>
                    <td class="tdcls">120</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <td class="tdcls">
                        <p class="status status-paid">Paid</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">2021</a></td>
                    <td class="tdcls">March</td>
                    <td class="tdcls">120</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <td class="tdcls">
                        <p class="status status-paid">Paid</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">2021</a></td>
                    <td class="tdcls">February</td>
                    <td class="tdcls">129</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <td class="tdcls">
                        <p id="pendingbtn" class="status status-pending">Pending</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">2021</a></td>
                    <td class="tdcls">February</td>
                    <td class="tdcls">129</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <td class="tdcls">
                        <p id="pendingbtn" class="status status-pending">Pending</p>
                    </td>

                </tr>
            </tbody>

        </table>
    </div>
</div>
<div id="" class="paymentFormContainer">
    <button class="open-button" onclick="openForm()">Make The Payment</button>

    <div class="form-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <h1>Monthly Payment</h1>

            <label for="lid"><b>Lid</b></label>
            <input type="text" placeholder="Enter Lid" name="lid" required>

            <label for="date"><b>Date</b></label>
            <input type="date" placeholder="Enter Date" name="date" required>

            <label for="amount"><b>Amount(Rs)</b></label>
            <input type="text" placeholder="Enter the amount" name="amount" required>

            <button type="submit" class="btn">Pay</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
</div>
<?php include 'bottom-container.php'; ?>