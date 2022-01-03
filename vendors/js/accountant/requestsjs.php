<script>
    // ..........
    function getAdvanceRequests() {
        console.log("getAdvanceRequests");
        var url = "http://localhost/Thekolaya/accountant/getAdvanceRequests";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                if (len == 0) {
                    
                } else {
                    for (var i = 0; i < len; i++) {

                        var deleteBtn = $("<button>Delete</button>");

                        var str =
                            "<tr class='row' onclick='rowClick()'>" +
                            "<td class='tdcls'>" +
                            data[i].request_id +
                            "</td>" +
                            "<td>" +
                            data[i].lid +
                            "</td>" +
                            "<td>" +
                            data[i].name +
                            "</td>" +

                            "<td>" +
                            data[i].request_date +
                            "</td>" +
                            "<td>" +
                            data[i].amount_rs +
                            "</td>" +
                            //     "<td class='actionCol'>"+
                            //    // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +

                            //    "<button type='button' id='editbutton' onclick='deleteRow()' >" +
                            //      "Delete"+
                            //     "</button>" +

                            //     "</td>"+
                            "</tr>";
                        $("#requeststbl tbody").append(str);
                        // there in the table DO NOT DEFINE <tbody> MANULLY
                        //IF SO IT WILL SHOW THE RESULTS TWICE
                    }
                }

            }
        })
    }



    // when a row is clicked fill the details to the form automatically
    function rowClick() {
        // remobe the row from ui
        $('#requeststbl tbody').on('click', 'tr', function() {
            //console.log("dd");
            // remobe the row from ui
            //$(this).closest('tr').remove();

            var $row = $(this).closest("tr"), // Finds the closest row <tr> 
                $rid = $row.find("td:nth-child(1)"); // ist column value
            $lid = $row.find("td:nth-child(2)");
            $name = $row.find("td:nth-child(3)"); // ist column value
            $rDate = $row.find("td:nth-child(4)");
            $amount = $row.find("td:nth-child(5)");

            var Rid = $rid.text(); // rid as a javascript variable
            var Lid = $lid.text();
            var name = $name.text(); // rid as a javascript variable
            var rDate = $rDate.text();
            var amount = $amount.text(); // rid as a javascript variable


            console.log(amount);
            document.getElementById("rid").value = this.cells[0].innerHTML;
            document.getElementById("lid").value = this.cells[1].innerHTML;
            document.getElementById("name").value = this.cells[2].innerHTML;
            document.getElementById("date").value = this.cells[3].innerHTML;
            document.getElementById("amount").value = this.cells[4].innerHTML;
            //check date and delete
            var todaysDate = new Date();
            var thisMonth = todaysDate.getMonth() + 1;
            var thisYear = todaysDate.getFullYear();


        });

    }


    // request submission form
    //  form submit - Accept Request
    $(document).ready(function() {
        $('#acceptBtn').click(function(event) {
            // validateAmount();
            event.preventDefault();

            var form = $('#requestForm').serializeArray();


            $('.error').remove(); // remove the previos error messages displayed
            // after clicking the update again the same error may appear so have to remove previous errors

            var rid = $('#rid').val();
            var lid = $('#lid').val();
            var name = $('#name').val();
            var date = $('#date').val();
            var amount = $('#amount').val();
            var comment = $('textarea#Comment').val();
            var action = 'Save';

            if (amount <= 0) {
                return;
            }
            var str = "Request Id:  " + rid + "\n" +
                "Landowner's Id :   " + lid + "\n" +
                "Landowner'Name :   " + name + "\n" +
                "Requested Date :   " + date + "\n" +
                "Amount :   " + amount + "\n" +
                "Comment :   " + comment + "\n";
            Swal.fire({
                title: 'Confirm Update ',
                icon: 'warning',
                //   html:'<div>Line0<br />Line1<br /></div>',
                html: '<pre>' + str + '</pre>',
                //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
                confirmButtonColor: '#4DD101',
                cancelButtonColor: '#FF2400',
                confirmButtonText: 'Confirm!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#requestForm").trigger("reset");

                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL ?>accountant/requests",

                        data: {
                            action: action,
                            amount: amount,
                            comment: comment,
                            rid: rid,
                            name: name,
                        },
                        success: function(data) {

                            console.log(data);
                            Swal.fire(
                                'Updated!',
                                'Your file has been updated.',
                                'success'
                            )
                            clearTable();
                            getAdvanceRequests();
                            // getTable();
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
        })
    })



    //  form submit - Reject Request
    $(document).ready(function() {
        $('#reject').click(function(event) {
            // validateAmount();
            event.preventDefault();

            var form = $('#requestForm').serializeArray();


            $('.error').remove(); // remove the previos error messages displayed
            // after clicking the update again the same error may appear so have to remove previous errors

            var rid = $('#rid').val();
            var lid = $('#lid').val();
            var name = $('#name').val();
            var date = $('#date').val();
            var amount = $('#amount').val();
            var comment = $('textarea#Comment').val();
            var action = 'Reject';

            if (amount <= 0) {
                return;
            }
            var str = "Request Id:  " + rid + "\n" +
                "Landowner's Id :   " + lid + "\n" +
                "Landowner'Name :   " + name + "\n" +
                "Requested Date :   " + date + "\n" +
                "Amount :   " + amount + "\n" +
                "Comment :   " + comment + "\n";
            Swal.fire({
                title: 'Reject the request !',
                icon: 'warning',
                //   html:'<div>Line0<br />Line1<br /></div>',
                html: '<pre>' + str + '</pre>',
                //text: "Price Per Unit:  "+amount+"Amount: "+"<br>"+"Amount",
                confirmButtonColor: '#4DD101',
                cancelButtonColor: '#FF2400',
                confirmButtonText: 'Confirm!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#requestForm").trigger("reset");

                    $.ajax({
                        type: "POST",
                        url: "<?php echo URL ?>accountant/requests",

                        data: {
                            action: action,
                            amount: amount,
                            comment: comment,
                            rid: rid,
                            name: name,
                        },
                        success: function(data) {

                            console.log(data);
                            Swal.fire(
                                'Rejection Updated!',
                                'Requested was rrejected.',
                                'success'
                            )
                            clearTable();
                            getAdvanceRequests();
                            // getTable();
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
        })
    })
    // previous


    function clearTable() {
        // $("#updateAuctionTable tr").remove();
        $('.row ').remove(); // removing the previus rows in the ui
    }


    function searchName(){
         // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("lname");
  filter = input.value.toUpperCase();
  table = document.getElementById("requeststbl");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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