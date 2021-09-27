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
        <button class="backbtn" onclick="location.href='<?php echo URL?>/accountant/landowners';">Back</button>
    </div>
    <div class="labelsection">
    <span class="">Landowner's ID:</span>
    <label class="label info" for="">L25</label>
    <span class="">Landowner's Name:</span>
    <label class="label info" for="lid">Kamal Jayawardane</label>
    </div>
    <div class="requestsbtnsection">
    <button class="requestsbtn">Advance Requests</button>
    </div>
    
</div>

<!-- ****** landowner details bar chart ******** -->
<div class="barChartSection">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

        <script>
            var xValues = ["January", "February", "March", "April", "May"];
            var yValues = [4500, 4900, 3400, 2400, 2500];
            var barColors = ["#2BD47D", "#ffc233", "#e05260", "#66b0ff"];

            new Chart("myChart", {
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
    <?php include 'bottom-container.php'; ?>