<?php include 'top-container.php'; ?>


<body onload="getTable();lastMonthIncomeAndAdvance();lastMonthTeaPrice();"></body>

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
                <div class="number" id="teaPrice"></div>
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

        <input type="month" id="selectedMonth" name="selectedMonth" min="2021-09" value="2022-03">
        <button class="monthSearch" onclick="searchByDate()">search</button>

    </div>



    <!-- table head -->
    <div class=" table-head">
        <h1 id="month"></h1>
    </div>
    <!-- neeeded -->


    <!-- table for monthly details  -->

    <div class="table tableplace" id="pricetbl">
        <table class="teapricetable" id="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Date</th>
                    <th class="thcls">Initial Weight From Agent</th>
                    <th class="thcls">Initial Weight From Supervisor</th>
                    <th class="thcls">Container Precentage</th>
                    <th class="thcls">Water Precentage</th>
                    <th class="thcls">Net Weight</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>


</div>


<?php include 'js/landowner/Monthly_Incomejs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>