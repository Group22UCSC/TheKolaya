<?php include 'top-container.php'; ?>
<!-- Top container -->

<body onload="changeFormBody()">

</body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Make_Requests.css">
<script defer src="<?php echo URL ?>vendors/js/landowner/Make_Requests.js""></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <select id="RequestType" name="RequestType" onchange="changeFormBody()">
                    <option value="Fertilizer">Fertilizer</option>
                    <option value="Advance">Advance</option>
                </select>
            </div>

            <div class="inputfield" id="Fertilizer">
                <label for="qnty">Quantity</label>
                <input type="text" id="qnty" class="input">
            </div>
            <div class="inputfield" id="Advance">
                <label for="amount">Amount(Rs)</label>
                <input type="text" id="amount" class="input">
            </div>
            <div class="inputfield">
                <input type="button" value="Confirm Requests" data-modal-target="#modal" class="btn" name="update">
            </div>


        </div>
    </div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
<form action="<?php echo URL ?>landowner/Make_Requests" method="post">
    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="title">Confirm Request</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <div class="year">
                <label>Date : </label>
                <input type="text" name="date" class="model-input" value="<?php echo date("Y-m-d") ?>" readonly>
            </div>
            <div class="month">
                <label>Time : </label>
                <input type="text" name="time" class="model-input" value="<?php echo date("h : i : s a") ?>" readonly>
            </div>
            <div class="month">
                <label>Request Type : </label>
                <input type="text" id="rtype" name="rtype" class="model-input" readonly>
            </div>
            <div class="price">
                <label>Quantity : </label>
                <input type="text" id="priceInput" class="model-input" name="qty" readonly>
            </div>
            <div class="buttonSection">
                <a class="editbtn" data-close-button>Edit</a>

                <input type="submit" value="Submit" class="confirmbtn" name="teaPriceConfirm">



            </div>
        </div>
    </div>
    <div id="overlay"></div>
</form>

<!--  **********   view previous details   *** -->



<?php include 'bottom-container.php'; ?>