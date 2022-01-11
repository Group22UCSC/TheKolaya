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
$month06end = date('Y-m-t', strtotime("0 month"));
$month05start = date('m', strtotime("-1 month"));  //  prev month
$month05end = date('Y-m-t', strtotime("-1 month"));
$month04start = date('m', strtotime("-2 month")); // 2 onths ago
$month04end = date('Y-m-t', strtotime("-2 month"));
$month03start = date('m', strtotime("-3 month")); // 3months ago
$month03end = date('Y-m-t', strtotime("-3 month"));
$month02start = date('Y-m-01', strtotime("-4 month")); // 4 months ago
$month02end = date('Y-m-t', strtotime("-4 month"));
$month01start = date('Y-m-01', strtotime("-5 month")); // 5 months ago
$month01end = date('Y-m-t', strtotime("-5 month"));
// echo $month04start;
$tea = array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');// array to store tea net weights of each month
// (int)$tea[11]=(int)$tea[11]+5;
// echo (int)$tea[11];
// echo $len;
$tea6=0.0;
for ($i = 0; $i < $len; $i++) {
    
    $dateTest = $data1[$i]['date']; //get the date of which the net weight was added
    $dateTest2 = date('Y-m-d', strtotime($dateTest));
    $month = date('m', strtotime($dateTest2));
    echo $month;
    (int)$tea[$month] += (int)$data1[$i]['net_weight'];
    if($month==$month06start){
        $tea6+=(float)$data1[$i]['net_weight'];
    }
    // if (($dateTest >= $month05start) && ($dateTest <= $month05end)) {
    //     // echo $data1[$i]['date'];
    //     (int)$tea[$month] += (int)$data1[$i]['net_weight'];
    //     // array_push($tea,$data1[$i]['net_weight']);
    // }
}
// print_r($tea);
echo $tea6;

?>
<!-- ****** landowner details bar chart ******** -->
<div class="barChartAndRatingSection">

    <div class="barChartSection">
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
        <input type="text" id="tea6" value="8">
        <script>
            var tea6=document.getElementById("tea6").value;
            console.log(tea6);
            val05 = '<?php echo $tea[12]; ?>'; // get the valu from php to js
            
            console.log(val05);
            var xValues = ["January", "February", "March", "April", "May"];
            var yValues = [120, 490, 340, val05, 250];
            var barColors = ["#2BD47D", "#ffc233", "#e05260", "#66b0ff"];

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
                        text: "Income to the factory in Rs   "
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
            var xValues = ["Best", "Good", "Average", "Poor"];
            var yValues = [60, 20, 10, 10];
            var barColors = ["#2BD47D", "#91f084", "#ffc233", "#e05260"];

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

    <div class="list">
        <ul>
            <li>Best Quality</li>
            <li>Good Quality</li>
            <li>Average Quality</li>
            <li>Poor Quality</li>
        </ul>
    </div>

</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php include 'js/accountant/landownersGraphpagejs.php';?>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>