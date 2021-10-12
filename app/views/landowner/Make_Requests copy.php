<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Make_Requests.css">
<script defer src="<?php echo URL ?>vendors/js/landowner/Make_Requests.js""></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="top-container">
    <p>Make Requests</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapperForm">

    <div class="form">
        <?php
        date_default_timezone_set("Asia/colombo");
        date_default_timezone_set("Asia/colombo");
        $date = date("Y - m - d");
        $month_date = date("m/d");
        $dateName = date("l");
        $time = date("h : i : s a");
        $timesplit = date("h:i a");
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
            <input type="text" class="input" value="<?php echo $date ?> <?php echo " / " ?> <?php echo $dateName ?>  " readonly>
        </div>
        <div class="inputfield">
            <label>Time</label>
            <input type="text" class="input" value="<?php echo $time ?>" readonly>
        </div>
        <div class="inputfield">
            <label for="Request Type">Request Type</label>
            <select id="RequestType" name="RequestType">
                <option value="div1">Fertilizes</option>
                <option value="div2">Advance</option>
            </select>
        </div>

        <div class="inputfield">
            <label>Quantity</label>
            <input type="text" id="QuantityForm" name="Quantity" class="input" value="ssf">
            </select>
        </div>

        <!-- <div class="inputfield hide" id="div2">
            <label>Price</label>
            <input type="text" class="input">
            </select>
        </div>
        <script type="text/javascript">
            function handleSelection(choice) {
                document.getElementById('select').disabled = true;
                document.getElementById(choice).style.display = "block"
            }
        </script> -->



        <div class="inputfield">
            <input type="button" value="Submit Request" data-modal-target="#modal" class="btn" name="price" <?php if ($isPriceSet) {
                                                                                                                echo "disabled";
                                                                                                            } ?>>
        </div>


    </div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
<form action="<?php echo URL ?>landowner/Make_Requests" method="post">
    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="title">Confirm Requests</div>
            <a data-close-button class="close-button">close</a>
        </div>
        <div class="modal-body">
            <div class="month_date">
                <label>Date : </label>
                <input type="text" name="year" class="model-input" value="<?php echo $month_date ?>" readonly>
            </div>
            <div class="Time">
                <label>Time :</label>
                <input type="text" name="month" class="model-input" value="<?php echo $timesplit ?>" readonly>
            </div>
            <div class="price">
                <label>Request Type :</label>
                <input type="text" id="priceInput" class="model-input" name="teaPrice" readonly>
            </div>
            <div class="price">
                <label>Quantity : </label>
                <input type="text" id="QuantityInput" class="model-input" name="teaPrice">
            </div>
            <div class="buttonSection">
                <a class="editbtn" data-close-button>Edit</a>

                <input type="submit" value="Submit" class="confirmbtn" name="teaPriceConfirm">



            </div>
        </div>
    </div>
    <div id="overlay"></div>
</form>
</div>
<?php include 'bottom-container.php'; ?>