<script>
    function lastMonthIncomeAndAdvance() {
        var url = "<?php echo URL ?>landowner/lastMonthIncomeAndAdvance";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",

            success: function(data) {
                console.log(data);
                var income = data[0].final_payment;
                var advance = data[0].advance_expenses;
                document.getElementById("income").innerHTML = income;
                document.getElementById("advance").innerHTML = advance;


            }
        })

    }

    function getTeaQulity() {

        var totRating = 0.0;
        var count = 0;
        var url = "<?php echo URL ?>landowner/getTeaQulity";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    totRating = totRating + data[i].quality;
                    count++;
                }
                console.log(count);
                var rating = (totRating / (count * 100)) * 5;
                var rounded = Math.round(rating * 10) / 10; //convert to single desimal point number
                console.log(rounded);
                document.getElementById("rating").innerHTML = rounded;
            }
        })

    }
</script>