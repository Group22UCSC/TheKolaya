<?php include 'top-container.php'; ?>
<!-- Top container -->

<body onload="changeFormBody();">

</body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Make_Requests.css">


<div class="top-container">
    <p>Make Requests</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapperdiv">
    <div class="wrapperform">
        <!-- <div class="title">
           Emergency Message
        </div>         -->
        <div class="form">
            <?php
            $dateToday = date("Y-m-d");
            $year = date('Y', strtotime($dateToday));
            $month = date('F', strtotime($dateToday));
            //print_r($data);
            $y = count($data);
            $isPriceSet = 0;
            for ($j = 0; $j < $y; $j++) {
                $dbdate = $data[$j]['date'];
                $dbyear = date('Y', strtotime($dbdate));
                $dbmonth = date('F', strtotime($dbdate));
                if ($year == $dbyear and $month == $dbmonth) {
                    $isPriceSet = 1;
                }
            }

            ?>
            <form action="<?php echo URL ?>Landowner/Make_Requests" method="POST" id="makeRequestForm">
                <div class="inputfield">
                    <label>Date</label>
                    <input type="text" class="input" value="<?php echo date("Y-m-d") ?>" readonly>
                </div>
                <div class="inputfield">
                    <label>Time</label>
                    <input type="text" class="input" value="<?php echo date("h : i : s a") ?>" readonly>
                </div>
                <div class="inputfield">
                    <label>Request Type</label>
                    <select id="RequestType" name="rtype" onchange="changeFormBody()">
                        <option value="Fertilizer">Fertilizer</option>
                        <option value="Advance">Advance</option>
                    </select>
                </div>

                <div class="inputfield" id="Fertilizer">
                    <label for="qnty">Quantity(kg)</label>
                    <input type="number" id="qnty" class="input" name="fertilizer_amount">
                </div>
                <div class="inputfield" id="Advance">
                    <label for="amount">Amount(Rs)</label>
                    <input type="number" id="amount" class="input" name="advance_amount">
                </div>
                <div class="inputfield">
                    <input type="submit" value="Request" class="btn" name="confirmReq" id="requestBtn">
                </div>
            </form>

        </div>

    </div>
    <div class="deleteButtonFlex">
        <div class="deleteButton">
            <a href="<?php echo URL ?>landowner/deleteFertilizerRequests"><button>Previous Fertilizer Requests</button>
        </div>
        <div class="deleteButton">
            <a href="<?php echo URL ?>landowner/deleteAdvanceRequests"> <button onclick="previousPrices();">Previous Advance Requests</button>
        </div>
    </div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->


<script type="text/javascript" src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>

<?php include 'js/landowner/Make_Requestsjs.php'; ?>


<?php include 'bottom-container.php'; ?>