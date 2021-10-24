<script>
// *******  JQuery *******

//  form submit - INSERT
$(document).ready(function(){
  $('#setPriceBtn').click(function(event){
      event.preventDefault();
      var form = $('#setTeaPriceForm').serializeArray();
      // form.push({name:'stock_type', value: 'in_stock'});
      // form.push({name:'type', value: 'firewood'});

      $('.error').remove();
      var productName=$('#productName option:selected').text();
      var buyer=$('#buyer option:selected').text();
      var amount = $('#amount').val();
      var pid = $('#pid').val();
      var price = $('#price').val();
      var bid = $('#buyer').val();
      //console.log(amount+pid+price+bid);
      var action='save';
      if(amount < 0) {
          // $('#amount').parent().after("<p class=\"error\">Amount cannot be negative</p>");
          $('#amount').parent().after("<p class=\"error\">*Amount cannot be negative</p>");
      }else if(amount == 0) {
          $('#amount').parent().after("<p class=\"error\">*Please insert a valid amount</p>")
      }
      if(price < 0) {
          $('#price').parent().after("<p class=\"error\">*Price cannot be negative</p>");
      }else if(price == 0) {
          $('#price').parent().after("<p class=\"error\">*Price cannot be zero</p>");
      }

      if(amount <= 0 || price <= 0) {
          return;
      }
      var str="Product Name:  " +productName+ "\n" +
              "Amount :   " +amount+ "\n" +
              "Price:  " +price+ "\n" +
              "Buyer:  " +buyer+ "\n" +
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
              $("#auctionForm").trigger("reset");
              
              $.ajax({
                  type: "POST",
                  url: "http://localhost/Thekolaya/productmanager/updateAuction",
                  
                  data: {
                    action:action,
                    amount:amount,
                    pid:pid,
                    price:price,
                    bid:bid,
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
    var url="http://localhost/Thekolaya/productmanager/getAuctionTable";
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
               var date=data[i].date;
                var str=
                "<tr class='row'>"+
                "<td>"+
                    data[i].date+
                "</td>"+
                "<td>"+
                    data[i].product_id+
                "</td>"+
                "<td>"+
                    data[i].product_name+
                "</td>"+
                "<td>"+
                    data[i].sold_amount+
                "</td>"+
                "<td>"+
                    data[i].sold_price+
                "</td>"+
                "<td>"+
                    data[i].name+
                "</td>"+
                "<td>"+
                    data[i].sold_amount*data[i].sold_price+
                "</td>"+
                
                "<td>"+
                    // (date==date)? "Hi":"Bye";
                "</td>"+
                "</tr>";
                $("#updateAuctionTable tbody").append(str);
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