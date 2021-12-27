<script>
//  previous tea price button js
function previousPrices() {
        
        var val = document.getElementById("pricetbl").style.display;
        if (val == "none") {
            var val = document.getElementById("pricetbl").style.display = "grid";
            
        } else {
            var val = document.getElementById("pricetbl").style.display = "none";
        }
    }
    function scrollFunc(){

        window.scrollTo(0, 500);
    }


// *******  JQuery *******

//  form submit - INSERT
$(document).ready(function(){
  $('#setPriceBtn').click(function(event){
      event.preventDefault();
      var form = $('#setTeaPriceForm').serializeArray();
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
                      'Data updated successfully.',
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


// * get auction table - SELECT
<?php $dateToday=date("Y-m-d"); ?>
function getTable(){
    var url="http://localhost/Thekolaya/accountant/getTeaPrice";
    $.ajax({
        url:url,
        type:"GET",
        dataType:"JSON",
        success:function(data){
            console.log(data);
            var len=data.length;
            var action="";
            var todaysDate=new Date();
            var thisYear=todaysDate.getFullYear();
            var thisMonth=todaysDate.getMonth()+1;
            var thisDate=todaysDate.getDate();
            // console.log("Todays Date : "+todaysDate);
            // console.log("This year :"+thisYear+"This month :"+thisMonth+"This date :"+thisDate);


           //    $('#updateAuctionTable not(tbody)').empty();
        //$("#updateAuctionTable").trigger("reset");
       // $('updateAuctionTable').children( 'tr:not(:first)' ).remove();
            for(var i=0;i<len;i++){
                var date=new Date(data[i].date);
                var month=date.getMonth()+1;
                var year=date.getFullYear();
                var date2=date.getDate();

                var deleteBtn=$("<button>Delete</button>");
                //console.log("year :"+year+"month :"+month+"date :"+date2);


               
                // Check Date and Set DELETE BUTTONS TO THE TABLE
                // if(thisYear==year && thisMonth==month && thisDate==date2){
                //     deleteBtn.appendTo("#actionCol");
                // }else{
                //     $("#actionCol").append("<td>No Action</td>");
                // }




                // const month=data.getMonth()+1
                // console.log(date);
                var str=
                "<tr class='row'>"+
                "<td>"+
                    data[i].date+
                "</td>"+   
                "<td>"+
                    year+
                "</td>"+   
                "<td>"+
                    month+
                "</td>"+
              
                "<td>"+
                    data[i].price+
                "</td>"+
                "<td class='actionCol'>"+
               // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +
                    
               "<button type='button' id='editbutton' onclick='deleteRow()' >" +
                 "Delete"+
                "</button>" +

                "</td>"+
                "</tr>";
                $("#teapricetable tbody").append(str);
                // there in the table DO NOT DEFINE <tbody> MANULLY
                //IF SO IT WILL SHOW THE RESULTS TWICE
            }
            
        }
    }) 
}   

function checkForm(){
    var url="http://localhost/Thekolaya/accountant/getTeaPrice";
    var todaysDate=new Date();        
    var thisMonth=todaysDate.getMonth()+1;
    var thisYear=todaysDate.getFullYear();
    document.getElementById("year").value=thisYear;
    document.getElementById("month").value=thisMonth;
    var isPriceSet=0;
    $.ajax({
        url:url,
        type:"GET",
        dataType:"JSON",
        success:function(data){
            //console.log(data);
            var len=data.length;
         
            for(var i=0;i<len;i++){
                var date=new Date(data[i].date);
                var month=date.getMonth()+1;
                var year=date.getFullYear();
                if(month==thisMonth && year==thisYear){
                    isPriceSet=1;
                }
           }
           if(isPriceSet==1){
            document.getElementById("setPriceBtn").disabled = true;
            document.getElementById("price").value = "Tea Price Already Set";
            document.getElementById("price").readOnly = true;
            document.getElementById("price").className = "input-set";
            }
            if(isPriceSet==0){
            document.getElementById("setPriceBtn").disabled = false;
            document.getElementById("price").readOnly = false;
            document.getElementById("price").className = "input";
            }
            
        }
    }) 
        //     var todaysDate=new Date();
            
        //     var thisMonth=todaysDate.getMonth()+1;
        //     var thisYear=todaysDate.getFullYear();
            
        //     var isPriceSet=0;
            
        //     var len=data.length;
        //     document.getElementById("year").value=thisYear;
        //     document.getElementById("month").value=thisMonth;
        //     for(var i=0;i<len;i++){
        //         var date=new Date(data[i].date);
        //         var month=date.getMonth()+1;
        //         var year=date.getFullYear();
        //         if(month==thisMonth && year==thisYear){
        //             isPriceSet=1;
        //         }
        //    }
        //    if(isPriceSet==1){
        //     document.getElementById("setPriceBtn").disabled = true;
        //     }
}

function deleteRow(){
    // remobe the row from ui
    $('#teapricetable tbody').on('click','#editbutton',function(){
    // remobe the row from ui
    //$(this).closest('tr').remove();


    var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
    $date = $row.find("td:nth-child(1)"); // ist column value

    var date2=$date.text(); // date as a javascript variable
    console.log(date2);
    
    //check date and delete
    var todaysDate=new Date();        
    var thisMonth=todaysDate.getMonth()+1;
    var thisYear=todaysDate.getFullYear();



    var str="Delete tea price set on "+date2+" ?";
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
                  url: "http://localhost/Thekolaya/accountant/deleteSetTeaPriceRow",
                  
                  data: {
                    date:date2,
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



    });
   
}



function clearTable(){
    // $("#updateAuctionTable tr").remove();
    $('.row ').remove(); // removing the previus rows in the ui
}

</script>