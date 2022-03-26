
<script>
    var xValues = ["Green Tea","White Tea", "B-100 Black Tea","N Black Tea", "Early Black Tea","Masala chai","Matcha Tea", "Oolang Tea","Sencha Tea"];

    var yValues = [
    <?php echo $_SESSION['Green_Tea_stock']?>,
     <?php echo  $_SESSION['White_Tea_stock']?>,
      <?php echo  $_SESSION['B-100_Black_Tea_stock']?>, 
      <?php echo  $_SESSION['N_Black_Tea_stock']?>, 
      <?php echo  $_SESSION['Early_Black_Tea_stock']?>, 
      <?php echo  $_SESSION['Masala_chai_stock']?>,
       <?php echo  $_SESSION['Matcha_Tea_stock']?>,
        <?php echo  $_SESSION['Oolang_Tea_stock']?>,
        <?php echo  $_SESSION['Sencha_Tea_stock']?>,0];

    var barColors = ["#4DD101", "#089633","#4DD101", "#089633","#4DD101", "#089633","#4DD101", "#089633","#4DD101"];
    // 4DD101
    new Chart("myChart2", {
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

    
