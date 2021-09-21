<?php include 'topContainer.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- ******************* middle-container  **************************-->
    <div class="middle-container">

        <h1>PRODUCT MANAGER</h1>

        <div class="img-graph-container">
            <div class="graph-container one" id="income">
                <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
            </div>

            <div class="graph-container two" id="payment">
                <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
            </div>

            <script>
                var xValues = ["Bio tea", "Instant Tea", "Green Tea"];
                var yValues = [55, 49, 44, 24, 15];
                var barColors = ["#27ae60", "green","#2ecc71"];
                var graphName;
                for(var i = 1; i <= 2; i++) {
                    switch(i) {
                        case 1:
                            graphName = "Tea Products"
                            break
                        case 2:
                            graphName = "Auction Details"
                            break
                    }
                    var chartNum = "myChart"+i
                    new Chart(chartNum, {
                    type: "bar",
                    data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                    },
                    options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: graphName
                    }
                    }
                });
                }
                
            </script>

        </div>
        
        <div class="button-container desktop">
                <div class="btn view-products">
                    <a href="" class=""><i class="fas fa-coffee fa-2x"></i><br><br>View Products</a>
                </div>
                <div class="btn update-products">
                    <a href="" class=""><i class="fas fa-plus fa-2x"></i></i><br><br>Update Products</a>
                </div>
                <div class="btn update-auction">
                    <a href="" class=""><i class="fas fa-funnel-dollar fa-2x"></i><br><br>Update Auction</a>
                </div>
                <div class="btn view-auction">
                    <a href="" class=""><i class="fas fa-mug-hot fa-2x"></i><br><br>View Auction</a>
                </div> 
        </div>

        <div class="button-container mobile">
            <div class="btn-container top">
                <div class="btn view-products left-btn">
                    <a href="" class=""><i class="fas fa-coffee fa-2x"></i><br><br>View Products</a>
                </div>
                <div class="btn update-products right-btn">
                    <a href="" class=""><i class="fas fa-plus fa-2x"></i></i><br><br>Update Products</a>
                </div>
            </div>
            <div class="btn-container bottom">
                <div class="btn update-auction left-btn">
                    <a href="" class=""><i class="fas fa-funnel-dollar fa-2x"></i><br><br>Update Auction</a>
                </div>
                <div class="btn view-auction right-btn">
                    <a href="" class=""><i class="fas fa-mug-hot fa-2x"></i><br><br>View Auction</a>
                </div> 
            </div>
        </div>
    </div>
<?php include 'views/bottomContainer.php';?>
