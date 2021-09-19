
    <?php include 'topContainer.php';?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- ******************* middle-container  **************************-->
    <div class="middle-container">

        <h1>I AM THE ACCOUNTANT</h1>

        <div class="img-graph-container">
            <div class="graph-container one" id="income">
                <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
            </div>

            <div class="graph-container two" id="payment">
                <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
            </div>

            <div class="graph-container three" id="stock">
                <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
            </div>

            <script>
                var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
                var yValues = [55, 49, 44, 24, 15];
                var barColors = ["red", "green","blue","orange","brown"];
                var graphName;
                for(var i = 1; i <= 3; i++) {
                    switch(i) {
                        case 1:
                            graphName = "Income"
                            break
                        case 2:
                            graphName = "Payment"
                            break
                        case 3:
                            graphName = "Stock";
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
                <div class="btn landowners">
                    <a href="" class=""><i class="fas fa-user-tie fa-2x"></i><br><br>View LandOwners</a>
                </div>
                <div class="btn requests">
                    <a href="" class=""><i class="fas fa-sign-in-alt fa-2x"></i><br><br>Manage Requests</a>
                </div>
                <div class="btn payments">
                    <a href="" class=""><i class="fas fa-hand-holding-usd fa-2x"></i><br><br>Manage Payments</a>
                </div>
                <div class="btn tea-price">
                    <a href="" class=""><i class="fa fa-dollar-sign fa-2x"></i><br><br>Set Tea Price</a>
                </div>
                <div class="btn stock">
                    <a href="" class=""><i class="fas fa-chart-line fa-2x"></i><br><br>View The Stock</a>
                </div> 
        </div>

        <div class="button-container mobile">
            <div class="btn-container top">
                <div class="btn landowners">
                    <a href="" class=""><i class="fas fa-user-tie fa-2x"></i><br><br>View Land Owners</a>
                </div>
                <div class="btn requests">
                    <a href="" class=""><i class="fas fa-sign-in-alt fa-2x"></i><br><br>Manage Requests</a>
                </div>
                <div class="btn payments">
                    <a href="" class=""><i class="fas fa-hand-holding-usd fa-2x"></i><br><br>Payments</a>
                </div>
            </div>
            <div class="btn-container bottom">
                <div class="btn tea-price">
                    <a href="" class=""><i class="fa fa-dollar-sign fa-2x"></i><br><br>Set Tea Price</a>
                </div>
                <div class="btn stock">
                    <a href="" class=""><i class="fas fa-chart-line fa-2x"></i><br><br>View The Stock</a>
                </div> 
            </div>
        </div>
    </div>

        <!-- ************ bottom Container ********************* -->
        <?php include 'views/bottomContainer.php';?>