<?php include 'top-container.php'; ?>

<body onload="getTeaDetailsforBarchart();"></body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/landownersGraphpage.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!--  * Top Section ** -->
<div class="top-container">
    <p>Landowner's Details</p>
</div>

<!-- *********** Landowners details section ******** -->
<div class="labelSection">
    <div class="backbtnsection">
        <button class="backbtn" onclick="goBack()">Back</button>
    </div>

    <div class="labelsection">
        <span class="">Landowner's ID:</span>
        <label class="label info" for=""> <?php echo ($data[0]['user_id']); ?> </label>
        <span class="">Landowner's Name:</span>
        <label class="label info" for="lid"><?php echo ($data[0]['name']); ?></label>
    </div>
    <div class="requestsbtnsection">
        <button class="requestsbtn" onclick="location.href='<?php echo URL ?>/accountant/requests';">Advance Requests</button>
    </div>

</div>
<?php
// print_r($data);
// print_r($data1);
$today = date("Y-m-d");
$len = sizeof($data1);
// $month=date("m");
// $date = $data1[0]['date'];
// echo date('F, Y');
$month06start = date('m', strtotime("0 month"));  // this month
$month05start = date('m', strtotime("-1 month"));  //  prev month
$month04start = date('m', strtotime("-2 month")); // 2 onths ago
$month03start = date('m', strtotime("-3 month")); // 3months ago
$month02start = date('m', strtotime("-4 month")); // 4 months ago
$month01start = date('m', strtotime("-5 month")); // 5 months ago

// echo $month04start;
$tea = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'); // array to store tea net weights of each month
// (int)$tea[11]=(int)$tea[11]+5;
// echo (int)$tea[11];
// echo $len;
$tea6 = 0.0; // this month tea quantity
$tea5 = 0.0; // previous month tea quantity
$tea4 = 0.0; // 2 months ago tea quantity
$tea3 = 0.0;
$tea2 = 0.0;
$tea1 = 0.0;

// tea quality variables
$starts5=0;
$starts4=0;
$starts3=0;
$starts2=0;
$starts1=0;
for ($i = 0; $i < $len; $i++) {

    $dateTest = $data1[$i]['date']; //get the date of which the net weight was added
    $dateTest2 = date('Y-m-d', strtotime($dateTest));
    $month = date('m', strtotime($dateTest2));
    // echo $month;
    // (int)$tea[$month] += (int)$data1[$i]['net_weight'];
    if ($month == $month06start) {  // if date is this month's date
        $tea6 += (float)$data1[$i]['net_weight'];
    } else if ($month == $month05start) { // if date is previous month's date
        $tea5 += (float)$data1[$i]['net_weight'];
    } else if ($month == $month04start) {
        $tea4 += (float)$data1[$i]['net_weight'];
    } else if ($month == $month03start) {
        $tea3 += (float)$data1[$i]['net_weight'];
    } else if ($month == $month02start) {
        $tea2 += (float)$data1[$i]['net_weight'];
    } else if ($month == $month01start) {
        $tea1 += (float)$data1[$i]['net_weight'];
    } else {
    }

    // pie chart calculation
    if($data1[$i]['quality']>=80){
        $starts5+=1;
    }
    else if($data1[$i]['quality']>=60){
        $starts4+=1;
    }
    else if($data1[$i]['quality']>=40){
        $starts3+=1;
    }
    else if($data1[$i]['quality']>=20){
        $starts2+=1;
    }
    else if($data1[$i]['quality']>=0){
        $starts1+=1;
    }
    else{

    }
}
// print_r($tea);
// echo "Tea 5 :".$tea2;

?>
<!-- ****** landowner details bar chart ******** -->
<div class="barChartAndRatingSection">

    <div class="barChartSection">
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
        <input type="text" id="tea6" value="8" hidden>
        <script>
            // var tea6=document.getElementById("tea6").value;
            // console.log(tea6);
            val06 = '<?php echo $tea6; ?>'; // get the valu from php to js
            val05 = '<?php echo $tea5; ?>';
            val04 = '<?php echo $tea4; ?>';
            val03 = '<?php echo $tea3; ?>';
            val02 = '<?php echo $tea2; ?>';
            val01 = '<?php echo $tea1; ?>';
            console.log(tea6);
            console.log(val05);
            var m = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var last_n_months = []
            var d = new Date()
            for (var i = 5; i >= 0; i--) {
                last_n_months[i] = m[d.getMonth()] 
                d.setMonth(d.getMonth() - 1)
            }
            var xValues = last_n_months;
            var yValues = [val01, val02, val03, val04, val05, val06];
            var barColors = ["#2BD47D", "#ffc233", "#e05260", "#66b0ff", "#ffc233"];

            new Chart("myChart1", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Supplied Tea Amount (Kg) "
                    }
                }
            });
        </script>

    </div>
    <!-- ********* Rating Section ********* -->
    <div class="ratingSection">
        <!-- <p> Tea Quality Rating</p> -->

        <canvas id="myChart2" style="width:100%;max-width:300px"></canvas>

        <script>
            starts5 = '<?php echo $starts5; ?>';
            starts4 = '<?php echo $starts4; ?>';
            starts3 = '<?php echo $starts3; ?>';
            starts2 = '<?php echo $starts2; ?>';
            starts1 = '<?php echo $starts1; ?>';
            console.log("starts: "+starts3);
            var xValues = ["Best", "Good", "Medium","Poor", "Not Acceptable"];
            var yValues = [starts5, starts4, starts3, starts2,starts1];
            var barColors = ["#0AF331","#0BAD61", "#DAEA11", "#F19806","#F13806"];

            new Chart("myChart2", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Tea Quality Rating"
                    }
                }
            });
        </script>
    </div>

    <!-- <div class="list">
        <ul>
            <li>Best Quality</li>
            <li>Good Quality</li>
            <li>Average Quality</li>
            <li>Poor Quality</li>
        </ul>
    </div> -->

</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php include 'js/accountant/landownersGraphpagejs.php'; ?>
<script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>