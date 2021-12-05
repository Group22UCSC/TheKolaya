<script>
    var table = document.getElementById('requeststbl');

    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            //rIndex = this.rowIndex;
            document.getElementById("rid").value = this.cells[0].innerHTML;
            document.getElementById("lid").value = this.cells[1].innerHTML;
            document.getElementById("name").value = this.cells[2].innerHTML;
            document.getElementById("date").value = this.cells[3].innerHTML;
            document.getElementById("amount").value = this.cells[4].innerHTML;
        };
    }


    // ..........
    function getAdvanceRequests() {
        console.log("d");
        var url = "http://localhost/Thekolaya/accountant/getAdvanceRequests";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
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
                $lid=$row.find("td:nth-child(2)");
                $name = $row.find("td:nth-child(3)"); // ist column value
                $rDate=$row.find("td:nth-child(4)");
                $amount=$row.find("td:nth-child(5)");

            var Rid = $rid.text(); // rid as a javascript variable
            var Lid= $lid.text();
            var name = $name.text(); // rid as a javascript variable
            var rDate= $rDate.text();
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
$(document).ready(function(){
  $('#acceptBtn').click(function(event){
      event.preventDefault();
      var form = $('#myForm').serializeArray();
      // form.push({name:'stock_type', value: 'in_stock'});
      // form.push({name:'type', value: 'firewood'});

     
      $('.error').remove();
      var Year=$('#year').val();
      var Month = $('#month').val();
      var price = $('#price').val();
      
      //console.log(amount+pid+price+bid);
      var action='save';
      
      if(price < 0) {
          $('#price').parent().after("<p class=\"error\">*Price cannot be negative</p>");
      }else if(price == 0) {
          $('#price').parent().after("<p class=\"error\">*Price cannot be zero</p>");
      }

      if(price <= 0) {
          return;
      }
      var str="Year" +Year+ "\n" +
              "Month :   " +Month+ "\n" +
              "Price:  " +price+ "\n" +
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
              $("#setTeaPriceForm").trigger("reset");
              
              $.ajax({
                  type: "POST",
                  url: "http://localhost/Thekolaya/accountant/setTeaPrice",
                  
                  data: {
                    action:action,
                    year:Year,
                    month:Month,
                    teaPrice:price,
                  },
                  success: function(data) {
                      
                      Swal.fire(
                      'Updated!',
                      'Your file has been updated.',
                      'success'
                      )
                      clearTable();
                      getTable();
                      checkForm();
                  },
                  error : function (xhr, ajaxOptions, thrownError) {
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

</script>