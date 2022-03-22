<script>
    // * get auction table - SELECT
    <?php $dateToday = date("Y-m-d"); ?>

    function getLandonwerTable() {
        var url = "<?php echo URL ?>/accountant/getLandonwerTable";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    var date = data[i].date;
                    var str =
                        "<tr class='row'>" +
                        "<td>" +
                        data[i].user_id +
                        "</td>" +
                        "<td>" +
                        data[i].name +
                        "</td>" +
                        "<td>" +
                        data[i].contact_number +
                        "</td>" +
                        "<td>" +
                        data[i].address +
                        "</td>" +

                        "<td class='actionCol'>" +
                        // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +

                        "<button type='button' id='editbutton' onclick='loadLandGraphPage()' >" +
                        "View Details" +
                        "</button>" +

                        "</td>" +
                        //<button id="tblbtn" class="tblbutton" onclick="location.href='<?php echo URL ?>/accountant/landownersGraphpage';">View Deatils</button>
                        "</tr>";
                    $("#teapricetable tbody").append(str);
                    // there in the table DO NOT DEFINE <tbody> MANULLY
                    //IF SO IT WILL SHOW THE RESULTS TWICE
                }

            }
        })
    }


    //search function of the landowners details page - by lid
    function searchByLid() {
        // Declare variables
        // alert("sdd");
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("lid");
        filter = input.value.toUpperCase();
        table = document.getElementById("teapricetable");
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

    //search function of the landowners details page - by lid

    function searchByName() {
        // Declare variables
        // alert("sdd");
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("lname");
        filter = input.value.toUpperCase();
        table = document.getElementById("teapricetable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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

    function loadLandGraphPage(){
        // alert("dsd");
        // var lid = $("#lid").val();
        $('#teapricetable tbody').on('click', 'tr', function() {
            // alert("dd");
            var $row = $(this).closest("tr"), // Finds the closest row <tr> 
                $rid = $row.find("td:nth-child(1)"); // ist column value
            $lid = $row.find("td:nth-child(1)");

        
            var Lid = $lid.text();
            // alert(Lid);
        window.open("<?php echo URL ?>accountant/landownersGraphpage/"+Lid+"","_self");

        });
        // window.open("<?php echo URL ?>accountant/pdf/"+lid+"/"+Year+"/"+Month+"", "_blank");


    }
    
</script>