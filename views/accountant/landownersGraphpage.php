<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/landownersGraphpage.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!--  * Top Section ** -->
<div class="middle-section">
    <div class="top-container">
        <div class="left"></div>
        <div class="middle">
            Landowners Details
        </div>
        <div class="right"></div>
    </div>
</div>
<!-- *********** Landowners details section ******** -->
<div class="labelSection">
    <span class="label info">Landowner's ID:</span>
    <label class="valuetxt" for="">L25</label>
    <span class="label info">Landowner's Name:</span>
    <label class="labeltxt" for="lid">Landowner's Name:</label>
    
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