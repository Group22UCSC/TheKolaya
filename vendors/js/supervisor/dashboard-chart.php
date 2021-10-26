
<script>
    var xValues = ["Firewood", "fertilizer"];
    var yValues = [<?php echo $data[1]['full_stock']?>, <?php echo $data[0]['full_stock']?>, 0];
    var barColors = ["#4DD101", "#089633"];
    // 4DD101
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
        legend: {display: false},
        title: {
        display: true,
        // text: "World Wine Production 2018"
        }
    }
    });
</script>

