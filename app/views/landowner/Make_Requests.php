<?php include 'top-container.php'; ?>
<!-- Top container -->

<body onload="changeFormBody();getTable();checkForm()">

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
<script>
    $(document).ready(function() {
        $('#requestBtn').click(function(event) {
            event.preventDefault();
            var form = $('#makeRequestForm').serializeArray();

            // $('.error').remove();
            // var inAmount = $('#in_amount').val();
            // var pricePerUnit = $('#price_per_unit').val();
            // var priceForAmount = pricePerUnit * inAmount;
            console.log(form);
            if (form[0]['value'] == 'Fertilizer') {
                var str = "<div style=\"display:flex; justify-content:center;\">" +
                    "<div style=\"text-align:left;\">" +
                    "<div>Request Type: <span style=\"color:#4DD101;\"><b> Fertilizer</b></span></div>" +
                    "<div>Amount :  <span style=\"color:#4DD101;\"><b> " + form[1]['value'] + "kg</b></span></div>" +
                    "</div>" +
                    "</div>";
            } else if (form[0]['value'] == 'Advance') {
                var str = "<div style=\"display:flex; justify-content:center;\">" +
                    "<div style=\"text-align:left;\">" +
                    "<div>Request Type: <span style=\"color:#4DD101;\"><b> Advance</b></span></div>" +
                    "<div>Amount :  <span style=\"color:#4DD101;\"><b> Rs." + form[2]['value'] + "</b></span></div>" +
                    "</div>" +
                    "</div>";
            }

            // if (inAmount == 0) {
            //     $('#in_amount').parent().after("<p class=\"error\">Please insert the amount</p>")
            // } else if (inAmount < 0) {
            //     $('#in_amount').parent().after("<p class=\"error\">Can't Insert minus values</p>");
            // }
            // if (pricePerUnit < 0) {
            //     $('#price_per_unit').parent().after("<p class=\"error\">Can't Insert minus values</p>");
            // } else if (pricePerUnit == 0) {
            //     $('#price_per_unit').parent().after("<p class=\"error\">Please insert the price per unit</p>");
            // }

            // if (pricePerUnit <= 0 || inAmount <= 0) {
            //     return;
            // }

            Swal.fire({
                title: 'Are you sure?',
                html: '<div>' + str + '</div>',
                // text: "Price Per Unit: "+form[0]['value']+" "+"Amount: "+form[1]['value']+" "+"Price For Amount: "+priceForAmount,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4DD101',
                cancelButtonColor: '#FF2400',
                confirmButtonText: 'Yes, Update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#makeRequestForm").trigger("reset");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL ?>Landowner/Make_Requests",
                        cache: false,
                        data: form,
                        success: function(data) {
                            Swal.fire(
                                'Updated!',
                                'Your file has been updated.',
                                'success'
                            )
                            // console.log(data);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                                // footer: '<a href="">Why do I have this issue?</a>'
                            })
                        }
                    })
                }
            })
        })
    })
</script>








<?php include 'js/landowner/Make_Requestsjs.php'; ?>


<?php include 'bottom-container.php'; ?>