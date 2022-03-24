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
                    console.log(data[i][0])


                    var str =
                        "<tr class='row'>" +
                        "<td>" +
                        data[i][0] +
                        "</td>" +
                        "<td>" +
                        data[i].initial_weight_agent +
                        "</td>" +
                        "<td>" +
                        data[i].initial_weight_sup +
                        "</td>" +

                        "<td>" +
                        data[i].container_precentage +
                        "</td>" +

                        "</tr>";
                    $("#teapricetable tbody").append(str);
                    // there in the table DO NOT DEFINE <tbody> MANULLY
                    //IF SO IT WILL SHOW THE RESULTS TWICE
                }

            }
        })

    }

    function searchByMonth() {
        alert(document.getElementById("selectedMonth").val());
    }


    function searchByDate() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("auctiondate");
        filter = input.value.toUpperCase();
        table = document.getElementById("auctionDetailsTble");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>