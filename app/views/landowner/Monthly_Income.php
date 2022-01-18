<?php include 'top-container.php'; ?>




<!-- Top dashboard home content -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Monthly_income.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<!-- <body onload="lastMonthIncomeAndAdvance();getTeaQulity();fertilizerUsage();"></body> -->


<!-- middle grid -->

<div class="container">

    <!-- first two boxes -->
    <div class="box-one">
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Last Month Income</div>
                <div class="number" id="income"></div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from previous month</span>
                </div>
            </div>
            <i class='bx bxs-cart-add cart one'></i>
        </div>
    </div>

    <div class="box-two">
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Last Month Tea Price</div>
                <div class="number" id="totMass"></div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from previous month</span>
                </div>
            </div>
            <i class='bx bxs-cart-add cart two'></i>
        </div>
    </div>


    <!-- search area -->

    <div class="search">
        <form action="/action_page.php">
            <input type="month" id="selectedMonth" name="selectedMonth">
            <input type="submit" value="search">
        </form>
    </div>



    <!-- table head -->
    <div class="table-head">
        <h1>JANUARY MONTH DETAILS</h1>
    </div>
    <!-- neeeded -->


    <!-- table for monthly details  -->

    <div class="table tableplace">


        <table class="teapricetable">
            <thead class="threadcls">

                <tr class="trcls">
                    <th class="thcls">Date</th>
                    <th class="thcls">Initial Weight From Agent</th>
                    <th class="thcls">Initial Weight From Supervisor</th>
                    <th class="thcls">Net Weight</th>
                </tr>

            </thead>
            <tbody>


                <tr>
                    <td class="tdcls"><a class="acls" href="#">10/6/2021</a></td>
                    <td class="tdcls">50kg</td>
                    <td class="tdcls">48kg</td>
                    <td class="tdcls">56kg</td>
                </tr>

                <tr>
                    <td class="tdcls"><a class="acls" href="#">10/1/2021</a></td>
                    <td class="tdcls">55kg</td>
                    <td class="tdcls">52kg</td>
                    <td class="tdcls">56kg</td>
                </tr>

                <tr>
                    <td class="tdcls"><a class="acls" href="#">09/24/2021</a></td>
                    <td class="tdcls">40kg</td>
                    <td class="tdcls">38kg</td>
                    <td class="tdcls">56kg</td>
                </tr>

                <tr>
                    <td class="tdcls"><a class="acls" href="#">09/17/2021</a></td>
                    <td class="tdcls">47kg</td>
                    <td class="tdcls">44kg</td>
                    <td class="tdcls">56kg</td>
                </tr>

                <tr>
                    <td class="tdcls"><a class="acls" href="#">09/9/2021</a></td>
                    <td class="tdcls">53kg</td>
                    <td class="tdcls">50kg</td>
                    <td class="tdcls">56kg</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>


<?php include 'js/landowner/dashboardjs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>