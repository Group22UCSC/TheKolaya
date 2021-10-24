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
                      'Your file has been updated.',
                      'success'
                      )
                      clearTable();
                      getTable();
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
           //    $('#updateAuctionTable not(tbody)').empty();
        //$("#updateAuctionTable").trigger("reset");
       // $('updateAuctionTable').children( 'tr:not(:first)' ).remove();
            for(var i=0;i<10;i++){
              // var date=data[i].date;
                var str=
                "<tr class='row'>"+
                "<td>"+
                    //data[i].date+
                "</td>"+
                
                
                "<td>"+
                    // (date==date)? "Hi":"Bye";
                "</td>"+
                "</tr>";
                $("#teapricetable tbody").append(str);
                // there in the table DO NOT DEFINE <tbody> MANULLY
                //IF SO IT WILL SHOW THE RESULTS TWICE
            }
            
        }
    })

}
// last row of auction table

function clearTable(){
    // $("#updateAuctionTable tr").remove();
    $('.row ').remove(); // removing the previus rows in the ui
}

</script>