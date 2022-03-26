<script>
    function lastMonthTeaPrice() {
        var url = "<?php echo URL ?>landowner/lastMonthTeaPrice";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",

            success: function(data) {

                console.log("pasindu");
                console.log(data);
                document.getElementById("teaPrice").innerHTML = data[0][0];
            }
        })


    }

    function lastMonthIncomeAndAdvance() {
        var url = "<?php echo URL ?>landowner/lastMonthIncomeAndAdvance";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",

            success: function(data) {
                // console.log(data);
                var income = data[0].final_payment;
                var advance = data[0].advance_expenses;
                document.getElementById("income").innerHTML = income;



            }
        })


    }


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




                var fullDate = data[0][0];
                var mydate = new Date(fullDate);
                console.log(mydate.getMonth());
                console.log(mydate.getFullYear());
                var mL = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];
                console.log(mL[mydate.getMonth()]);
                var sentance = "MONTHLY  DETAILS OF " + mydate.getFullYear() + " " + mL[mydate.getMonth()];
                console.log(sentance);
                document.getElementById("month").innerHTML = sentance;


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

                        "<td>" +
                        data[i].water_precentage +
                        "</td>" +

                        "<td>" +
                        data[i].net_weight +
                        "</td>" +

                        "</tr>";
                    $("#teapricetable tbody").append(str);
                    // there in the table DO NOT DEFINE <tbody> MANULLY
                    //IF SO IT WILL SHOW THE RESULTS TWICE
                }


            }
        })

    }

    function searchByDate() {
        event.preventDefault();
        // $dat = $_POST['selectedMonth'];
        var date = document.getElementById("selectedMonth").value;


        console.log(date);
        $('.row ').remove();



        var url = "http://localhost/Thekolaya/landowner/getSearchMonthDetails";
        $.ajax({

            url: url,
            type: "POST",
            dataType: "JSON",
            data: {
                date: date

            },
            success: function(data) {
                // console.log(data);
                var len = data.length;
                var action = "";

                var fullDate = data[0][0];
                var mydate = new Date(fullDate);
                console.log(mydate.getMonth());
                console.log(mydate.getFullYear());
                var mL = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];
                console.log(mL[mydate.getMonth()]);
                var sentance = "MONTHLY  DETAILS OF " + mydate.getFullYear() + " " + mL[mydate.getMonth()];
                console.log(sentance);
                document.getElementById("month").innerHTML = sentance;

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

                        "<td>" +
                        data[i].water_precentage +
                        "</td>" +

                        "<td>" +
                        data[i].net_weight +
                        "</td>" +

                        "</tr>";
                    $("#teapricetable tbody").append(str);
                    // there in the table DO NOT DEFINE <tbody> MANULLY
                    //IF SO IT WILL SHOW THE RESULTS TWICE
                }


            }
        })

        function clearTable() {
            event.preventDefault();
            // $("#updateAuctionTable tr").remove();
            $('.row ').remove(); // removing the previus rows in the ui
        }

    }

    function dateNotFound() {
        alert("df");
        Swal.fire({
            icon: 'error',
            title: 'Data Not Found',
            text: 'Data not found for the searched date'
        })
    }

















    // function searchByMonth() {
    //     alert(document.getElementById("selectedMonth").val());
    // }


    // function searchByDate() {
    //     var input, filter, table, tr, td, i, txtValue;
    //     input = document.getElementById("auctiondate");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("auctionDetailsTble");
    //     tr = table.getElementsByTagName("tr");

    //     // Loop through all table rows, and hide those who don't match the search query
    //     for (i = 0; i < tr.length; i++) {
    //         td = tr[i].getElementsByTagName("td")[0];
    //         if (td) {
    //             txtValue = td.textContent || td.innerText;
    //             if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //                 tr[i].style.display = "";
    //             } else {
    //                 tr[i].style.display = "none";
    //             }
    //         }
    //     }
    // }
</script>