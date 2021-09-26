<?php include 'topContainer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<!-- ******************* middle-container  **************************-->

<div class="button-container desktop">
    <div class="btn landowners">
        <a href="" class=""><i class="fas fa-handshake fa-5x"></i><br><br>Make Requests</a>
    </div>
    <div class="btn requests">
        <a href="" class=""><i class="fas fa-people-carry fa-5x"></i><br><br>Update Tea Availability </a>
    </div>
    <div class="btn payments">
        <a href="" class=""><i class="fas fa-money-bill-wave fa-5x"></i><br><br>Monthly Income</a>
    </div>
    <div class="btn tea-price">
        <a href="" class=""><i class="fas fa-balance-scale fa-5x"></i><br><br>Daily Net Weight</a>
    </div>
    <div class="btn stock">
        <a href="" class=""><i class="fas fa-hand-holding-usd fa-5x"></i><br><br>Monthly Tea Price</a>
    </div>
    <div class="btn stock">
        <a href="" class=""><i class="fas fa-user-circle fa-5x"></i><br><br>Manage Account</a>
    </div>
</div>
<div class="button-container mobile">
    <div class="btn landowners">
        <a href="" class=""><i class="fas fa-handshake fa-2x"></i><br><br>Make Requests</a>
    </div>
    <div class="btn requests">
        <a href="" class=""><i class="fas fa-people-carry fa-2x"></i><br><br>Update Tea Availability </a>
    </div>
    <div class="btn payments">
        <a href="" class=""><i class="fas fa-money-bill-wave fa-2x"></i><br><br>Monthly Income</a>
    </div>
    <div class="btn tea-price">
        <a href="" class=""><i class="fas fa-balance-scale fa-2x"></i><br><br>Daily Net Weight</a>
    </div>
    <div class="btn stock">
        <a href="" class=""><i class="fas fa-hand-holding-usd fa-2x"></i><br><br>Monthly Tea Price</a>
    </div>
    <div class="btn stock">
        <a href="" class=""><i class="fas fa-user-circle fa-2x"></i><br><br>Manage Account</a>
    </div>
</div>
<div class="middle-container">
    <h1>TEA SUPPLY DURING LAST WEEK </h1>
    <div class="img-graph-container">
        <div class="graph-container one" id="income">
            <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
        </div>

        <!-- <div class="graph-container two" id="payment">
            <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
        </div>

        <div class="graph-container three" id="stock">
            <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
        </div> -->

        <script>
            var xValues = ["Monday", "Tuesday,", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            var yValues = [50, 25, 35, 44, 37, 80, 77];
            var barColors = ["rgb(227, 36, 36)", "rgb(242, 207, 31)", "rgb(161, 242, 31)", "rgb(95, 250, 229)", "rgb(0, 57, 128)", "rgb(179, 0, 255)", "rgb(145, 134, 134)"];
            var graphName;
            for (var i = 1; i <= 3; i++) {
                switch (i) {
                    case 1:
                        graphName = "Weight"
                        break

                }
                var chartNum = "myChart" + i
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
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: graphName
                        }
                    }
                });
            }
        </script>
    </div>
</div>
<!-- ************ bottom Container ********************* -->
<?php include 'views/bottomContainer.php'; ?>