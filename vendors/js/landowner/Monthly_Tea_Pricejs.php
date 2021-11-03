<script>
    <?php $dateToday = date("Y-m-d"); ?>

    function getTable() {
        var url = "http://localhost/Thekolaya/landowner/getTeaPrice";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                var action = "";
                var todaysDate = new Date();
                var thisYear = todaysDate.getFullYear();
                var thisMonth = todaysDate.getMonth() + 1;
                var thisDate = todaysDate.getDate();

                for (var i = 0; i < len; i++) {
                    var date = new Date(data[i].date);
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    var date2 = date.getDate();




                    var str =
                        "<tr class='row'>" +
                        "<td>" +
                        data[i].date +
                        "</td>" +
                        "<td>" +
                        year +
                        "</td>" +
                        "<td>" +
                        month +
                        "</td>" +

                        "<td>" +
                        data[i].price +
                        "</tr>";
                    $("#teapricetable tbody").append(str);

                }

            }
        })
    }
</script>