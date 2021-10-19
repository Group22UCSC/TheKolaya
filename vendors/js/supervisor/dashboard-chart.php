
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
    // var xValues = [100,200,300,400,500,600,700,800,900,1000];

    // new Chart("myChart", {
    // type: "line",
    // data: {
    //     labels: xValues,
    //     datasets: [{ 
    //     data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
    //     borderColor: "#4DD101",
    //     fill: false
    //     }, { 
    //     data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
    //     borderColor: "#089633",
    //     fill: false
    //     }]
    // },
    // options: {
    //     legend: {display: false}
    // }
    // });
</script>

