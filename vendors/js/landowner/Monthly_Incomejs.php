<script>
    function getTable() {

        var url = "http://localhost/Thekolaya/landowner/getMonthlyIncome";
        $.ajax({

            url: url,
            type: "GET",
            dataType: "JSON",

            success: function(data) {
                console.log(data);
                var len = data.length;
                var action = "";

                for (var i = 0; i < len; i++) {


                    var str =
                        "<tr class='row'>" +
                        "<td>" +
                        data[i].date +
                        "</td>" +
                        "<td>" +
                        initial_weight_agent +
                        "</td>" +
                        "<td>" +
                        initial_weight_sup +
                        "</td>" +

                        "<td>" +
                        data[i].price +
                        "</td>" +
                        "<td class='actionCol'>" +
                        // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +

                        "<button type='button' id='editbutton' onclick='deleteRow()' >" +
                        "Delete" +
                        "</button>" +

                        "</td>" +
                        "</tr>";
                    $("#teapricetable tbody").append(str);
                    // there in the table DO NOT DEFINE <tbody> MANULLY
                    //IF SO IT WILL SHOW THE RESULTS TWICE
                }

            }
        })

    }
</script>