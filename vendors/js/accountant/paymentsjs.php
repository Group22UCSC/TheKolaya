<script>
  /// loading the pid for the first form



  document.querySelector('#lid').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      checkPayment();

    }
  });

  // check the payment is not done or not and if not call the load payment function
  function checkPayment() {
    var year = document.getElementById("year").value;
    var month = document.getElementById("month").value;
    var lid = document.getElementById("lid").value;
    //alert(lid);

    // get the name of the landowner
    var url1 = "<?php echo URL ?>accountant/checkPayment"; //check whether the customer is already paid
    $.ajax({
      url: url1,
      type: "POST",
      dataType: "JSON",
      data: {
        year: year,
        month: month,
        lid: lid,
      },
      success: function(data) {

        // var len = data.length;
        // var tot=0.0;
        // var monthlyPrice=0.0;
        if (data == false) { // data==false means no payment has benn done for the relevant lid
          loadPayment();
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Payment Already Completed',
            text: 'Payment Already Completed For This Landowner',
            // footer: '<a href="">Why do I have this issue?</a>'
          })
          console.log(data);
        }

        // if (len == undefined) { // if len==undefined from that LID 
        //   document.getElementById("lname").value = "No Landowner Found";
        // } else { //if found
        //   document.getElementById("lname").value = data[0].name;
        //   document.getElementById("lastPaidDate").value = data[1].toDate;

        //   //console.log();
        //   for(var i=0;i<len;i++){ // calculate the gross income

        //     if(parseFloat(data[i]['net_weight'])>0){
        //       tot+=parseFloat(data[i].net_weight);
        //     }
        //     if(parseFloat(data[i]['price'])>0){
        //       monthlyPrice=parseFloat(data[i].price);
        //     }
        //   }

        //   document.getElementById("grossIncome").value = monthlyPrice*tot;
        // }
        // console.log(tot);

      },
      error: function(xhr, ajaxOptions, thrownError) {
        Swal.fire({
          icon: 'error',
          title: 'User not found',
          text: 'Enter a valid Lid',
          // footer: '<a href="">Why do I have this issue?</a>'
        })
      }

    });
  }


  // prevent submitting the from when press Enter at month input feild
  document.querySelector('#month').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      checkPayment(); // call checkpayment and load details to the form
    }
  });
  // prevent submitting the from when press Enter at year input feild
  document.querySelector('#year').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      checkPayment(); // call checkpayment and load details to the form
    }
  });
  // prevent submitting the from when press Enter at year input feild
  document.querySelector('#chequeRef').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      checkPayment(); // call checkpayment and load details to the form
    }
  });


  // ****** load payment details to the form *******
  function loadPayment() {
    var year = document.getElementById("year").value;
    var month = document.getElementById("month").value;
    var lid = document.getElementById("lid").value;
    //alert(lid);

    // get the name of the landowner
    var url1 = "<?php echo URL ?>accountant/loadPayment"; //load details
    $.ajax({
      url: url1,
      type: "POST",
      dataType: "JSON",
      data: {
        year: year,
        month: month,
        lid: lid,
      },
      success: function(data) {
        console.log(data);
        var len = data.length;
        var tot = 0.0;
        var monthlyPrice = 0.0;
        var fertilizerAmount = 0.0;
        var fertilizerPrice = 0.0;
        var advanceExpenses = 0.0;

        if (len == undefined) { // if len==undefined from that LID 
          document.getElementById("lname").value = "No Landowner Found";
        } else { //if found
          document.getElementById("lname").value = data[0].name;

          //console.log();
          for (var i = 0; i < len; i++) { // calculate the gross income

            if (parseFloat(data[i]['net_weight']) > 0) { //calculate the total nettea weightof lid
              tot += parseFloat(data[i].net_weight);
            }
            if (parseFloat(data[i]['price']) > 0) {
              monthlyPrice = parseFloat(data[i].price);
              document.getElementById("teaPrice").value = data[i].price;
            }
            if (parseFloat(data[i]['amount']) == 0) {
              document.getElementById("fertilizer").value = data[i].amount;
            }
            if (parseFloat(data[i]['amount']) > 0) {
              fertilizerAmount += parseFloat(data[i].amount);

            }
            if (parseFloat(data[i]['price_per_unit']) > 0) {
              fertilizerPrice = parseFloat(data[i].price_per_unit);
            }
            if (parseFloat(data[i]['amount_rs']) > 0) {
              advanceExpenses += parseFloat(data[i].amount_rs);
            }
          }
          var grossIncome = parseFloat(monthlyPrice * tot);
          var fertilizerExpenses = parseFloat(fertilizerPrice * fertilizerAmount);
          document.getElementById("grossIncome").value = grossIncome; // after adding all print it to form
          document.getElementById("fertilizer").value = fertilizerExpenses; // after adding all print it to form
          document.getElementById("advance").value = advanceExpenses; // after adding all advance expenses
          var finalPayment = parseFloat(grossIncome) - parseFloat(fertilizerExpenses) - parseFloat(advanceExpenses);
          document.getElementById("final").value = finalPayment; // after adding 
        }

        // console.log(tot);

      },
      error: function(xhr, ajaxOptions, thrownError) {
        Swal.fire({
          icon: 'error',
          title: 'Payment Error',
          text: 'No payments to pay or Tea price is not set',
          // footer: '<a href="">Why do I have this issue?</a>'
        })
      }

    });
  }


  //  form submit - INSERT payment
  $(document).ready(function() {

    $('#paymentSubmitbtn').click(function(event) {
      event.preventDefault();
      var form = $('#paymentForm').serializeArray();

      $('.error').remove();

      var Year = $('#year').val();
      var Month = $('#month').val();
      var lid = $("#lid").val();
      // var price = $('#price').val();
      var lname = $("#lname").val();
      var gIncome = $("#grossIncome").val();
      var fertilizer = $("#fertilizer").val();
      var advance = $("#advance").val();
      var cheque = $("#chequeRef").val();
      var final = $("#final").val();

      //console.log(amount+pid+price+bid);
      var action = 'save';

      if (cheque == '') {
        document.getElementById("chequeRef").value = "Enter A Valid Cheque No";
        $("#chequeRef").css("color", "red");
        $('#chequeRef').focus(
          function() {
            // $(this).val='';
            document.getElementById("chequeRef").value = ""; //clear year feild to fill it
            $(this).css({
              'color': 'black' //make inyear feild black
            });
          });
      }




      //***** Validation of Year feild ****** */
      if (Year == '') {
        document.getElementById("year").value = "Enter A Valid Year";
        $("#year").css("color", "red");
        $('#year').focus(
          function() {
            // $(this).val='';
            document.getElementById("year").value = ""; //clear year feild to fill it
            $(this).css({
              'color': 'black' //make inyear feild black
            });
          });

      }
      if (!(Year > 1998 && Year < 2100)) {
        document.getElementById("year").value = "Enter A Valid Year";
        $("#year").css("color", "red");
        $('#year').focus(
          function() {
            // $(this).val='';
            document.getElementById("year").value = ""; //clear year feild to fill it
            $(this).css({
              'color': 'black' //make inyear feild black
            });
          });
      }

      // ***** Validation of Month feild ****** */
      if (Month == '') {
        document.getElementById("month").value = "Enter A Valid Month";
        $("#month").css("color", "red");
        $('#month').focus(
          function() {
            // $(this).val='';
            document.getElementById("month").value = ""; //clear year feild to fill it
            $(this).css({
              'color': 'black' //make inyear feild black
            });
          });

      }
      if (!(Month >= 1 && Month <= 12)) {
        document.getElementById("month").value = "Enter A Valid Month";
        $("#month").css("color", "red");
        $('#month').focus(
          function() {
            // $(this).val='';
            document.getElementById("month").value = ""; //clear year feild to fill it
            $(this).css({
              'color': 'black' //make inyear feild black
            });
          });
      }



      // return to the form without submitting  if any error
      if (cheque == 'Enter A Valid Cheque No' || cheque == '' || Year == '' || (!(Year > 1998 && Year < 2100)) || (!(Month >= 1 && Month <= 12)) || gIncome == '') {
        return;
      }
      var str = "Landowner :" + lname + "\n" +
        "Year :   " + Year + "\n" +
        "Month :   " + Month + "\n" +
        "Cheque No :   " + cheque + "\n" +
        "Final Payment:   " + final + "\n" +
        "\n";
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
          $("#paymentForm").trigger("reset");

          $.ajax({
            type: "POST",
            url: "<?php echo URL ?>accountant/setPayment",

            data: {
              year: Year,
              month: Month,
              lid: lid,
              gIncome: gIncome,
              fertilizer: fertilizer,
              advance: advance,
              cheque: cheque,
              final: final,
            },
            success: function(data) {

              Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
              )
              clearTable();
              getPayment();
              
              window.open("<?php echo URL ?>accountant/pdf/"+lid+"/"+Year+"/"+Month+"", "_blank");
              //callPdf();
              // checkForm();
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
  // payment set 

  function callPdf() {
    console.log("sd");
    // url: "http://localhost/Thekolaya/accountant/setTeaPrice",
    var url = "<?php echo URL ?>accountant/pdf";
    $.ajax({
      url: url,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        console.log(data);

      }
    })
  }


  //get payment details to the table
  function getPayment() {
    var url = "<?php echo URL ?>accountant/getPayment";
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        var len = data.length;
        var action = "";
        // var todaysDate=new Date();
        // var thisYear=todaysDate.getFullYear();
        // var thisMonth=todaysDate.getMonth()+1;
        // var thisDate=todaysDate.getDate();


        for (var i = 0; i < len; i++) {
          // var date=new Date(data[i].date);
          // var month=date.getMonth()+1;
          // var year=date.getFullYear();
          // var date2=date.getDate();

          var deleteBtn = $("<button>Delete</button>");


          var str =
            "<tr class='row'>" +
            "<td>" +
            data[i].Date +
            "</td>" +
            "<td>" +
            data[i].lid +
            "</td>" +
            "<td>" +
            data[i].year +
            "</td>" +

            "<td>" +
            data[i].month +
            "</td>" +
            "<td>" +
            data[i].income +
            "</td>" +
            "<td>" +
            data[i].fertilizer_expenses +
            "</td>" +
            "<td>" +
            data[i].advance_expenses +
            "</td>" +
            "<td>" +
            data[i].final_payment +
            "</td>" +
            "<td>" +
            data[i].cheque_Ref_No +
            "</td>" +

            "<td class='actionCol'>" +
            // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +

            "<button type='button' id='editbutton' onclick='deleteRow()' >" +
            "Delete" +
            "</button>" +

            "</td>" +
            "</tr>";
          $("#paymentTable tbody").append(str);
          // there in the table DO NOT DEFINE <tbody> MANULLY
          //IF SO IT WILL SHOW THE RESULTS TWICE
        }

      }
    })
  }


  function clearTable() {
    // $("#updateAuctionTable tr").remove();
    $('.row ').remove(); // removing the previus rows in the ui
  }



  function deleteRow() {
    // remobe the row from ui
    $('#paymentTable tbody').on('click', '#editbutton', function() {
      // remobe the row from ui
      //$(this).closest('tr').remove();


      var $row = $(this).closest("tr"), // Finds the closest row <tr> 
        $date = $row.find("td:nth-child(1)"); // ist COLUMN(Date,Lid,Year,....) value
      $lid = $row.find("td:nth-child(2)");
      $year = $row.find("td:nth-child(3)");
      $month = $row.find("td:nth-child(4)");


      var date2 = $date.text(); // date as a javascript variable
      var lid = $lid.text();
      var year = $year.text();
      var month = $month.text();
      console.log(date2);

      //check date and delete
      var todaysDate = new Date();
      var thisMonth = todaysDate.getMonth() + 1;
      var thisYear = todaysDate.getFullYear();



      var str = "Delete payment of " + lid + " for \n year : " + year + " month : " + month + " ?";
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
            url: "<?php echo URL ?>accountant/deletePayment",

            data: {
              lid: lid,
              year: year,
              month: month,
            },
            success: function(data) {
              console.log(data);
              Swal.fire(
                'Deleted!',
                'Your Record Was Deleted Succesfully.',
                'success'
              )
              clearTable();
              getPayment();
              // checkForm();
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
</script>