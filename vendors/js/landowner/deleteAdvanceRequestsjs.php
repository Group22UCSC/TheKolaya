<script>
    <?php $dateToday = date("Y-m-d"); ?>

    function getTable() {
        var url = "http://localhost/Thekolaya/landowner/getRequest";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                var action = "";

                console.log()

                for (var i = 0; i < len; i++) {

                    var deleteBtn = $("<button>Delete</button>");

                    var str =
                        "<tr class='row'>" +
                        "<td>" +
                        data[i].request_date.substring(0, data[i].request_date.indexOf(' ')) +
                        "</td>" +
                        "<td>" +
                        data[i].request_type +
                        "</td>" +
                        "<td class='actionCol'>" +
                        "<button type='button' id='editbutton' onclick='deleteRow()' >" +
                        "Delete" +
                        "</button>" +

                        "</td>" +
                        "</tr>";
                    $("#teapricetable tbody").append(str);
                }

            }
        })
    }



    function deleteRow() {
        // remove the row from ui
        $('#teapricetable tbody').on('click', '#editbutton', function() {
            // remobe the row from ui
            //$(this).closest('tr').remove();


            var $row = $(this).closest("tr"), // Finds the closest row <tr> 
                $date = $row.find("td:nth-child(1)"); // ist column value

            var date2 = $date.text(); // date as a javascript variable
            console.log(date2);

            //check date and delete
            var todaysDate = new Date();
            var thisMonth = todaysDate.getMonth() + 1;
            var thisYear = todaysDate.getFullYear();



            var str = "Delete tea price set on " + date2 + " ?";
            Swal.fire({
                title: 'Are You Sure ?',
                icon: 'warning',
                //   html:'<div>Line0<br />Line1<br /></div>',
                html: '<pre>' + str + '</pre>',
                //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
                confirmButtonColor: '#FF2400',
                cancelButtonColor: '#4DD101',
                confirmButtonText: 'Delete!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#setTeaPriceForm").trigger("reset");

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/Thekolaya/landowner/deleteRequestRow",

                        data: {
                            date: date2,
                        },
                        success: function(data) {
                            console.log(data);
                            Swal.fire(
                                'Deleted!',
                                'Your Record Was Deleted Succesfully.',
                                'success'
                            )
                            clearTable();
                            getTable();
                            checkForm();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                                // footer: '<a href="">Why do I have this issue?</a>'
                            })
                        }
                    })
                }
            })



        });

    }



    function clearTable() {
        // $("#updateAuctionTable tr").remove();
        $('.row ').remove(); // removing the previus rows in the ui
    }
</script>