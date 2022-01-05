<?php include 'top-container.php'; ?>
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
        <label class="label info" for=""> <?php echo($data[0]['user_id']);?> </label>
        <span class="">Landowner's Name:</span>
        <label class="label info" for="lid"><?php echo($data[0]['name']);?></label>
    </div>
    <div class="requestsbtnsection">
        <button class="requestsbtn" onclick="location.href='<?php echo URL ?>/accountant/requests';">Advance Requests</button>
    </div>

</div>

<!-- ****** landowner details bar chart ******** -->
<div class="barChartAndRatingSection">

    <div class="barChartSection">
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

        <script>
            var xValues = ["January", "February", "March", "April", "May"];
            var yValues = [4500, 4900, 3400, 2400, 2500];
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
            var barColors = ["#2BD47D","#91f084", "#ffc233", "#e05260"];

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
    function goBack(){
        window.history.back();
    }
</script>
<?php include 'bottom-container.php'; ?>