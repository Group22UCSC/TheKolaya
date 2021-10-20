<script>
function validation(){
  // var errArray=[];
  // errArray['name']="Melka";
  // let amount = document.getElementById('amount').value;
  // if (amount == "") {
  //   errArray['amountmissing']="Please fill the amount";
  // }
  // if(errArray.length==0){
  //   document.getElementById('amount').value=errArray['amountmissing'];
  // }
  // if(errArray.length==0){
  //   return true;
  // }
  return false;
}

  /// loading the pid for the first form
  
  function loadPid(){
      // console.log("ada");
      var e = document.getElementById("productName");
      var val= e.options[e.selectedIndex].value;
      document.getElementById('pid').value=val;
  }
  function loadBid(){
     
     var e = document.getElementById("buyer");
     var val= e.options[e.selectedIndex].value;
     document.getElementById('bid').value=val;
    //console.log(document.getElementById('bid').value);
  }
  /// getAll the details from the first form to the second
  function loadModalName(element){
  
      var text = element.options[element.selectedIndex].text;
      document.getElementById('modalName').value=text;
  
  }
  function loadModalName2(){  // loading the buyers name to the pop up
    // console.log("ada");
      var element=document.getElementById('productName');
      var text = element.options[element.selectedIndex].text;
      document.getElementById('modalName').value=text;
    
  }
  function getDetails(){
  
      // var name=document.getElementById('productName');
      // document.getElementById('modalName').value=name.options[sel.selectedIndex].text;
      
      // var sel = document.getElementById("box1");
      // var text= sel.options[sel.selectedIndex].text;
      
  
      var pid=document.getElementById('pid').value;
      document.getElementById('modalPid').value=pid;
  
  
      var amount=document.getElementById('amount').value;
      document.getElementById('modalAmount').value=amount;
  
      var price=document.getElementById('price').value;
      document.getElementById('modalPrice').value=price;


      var buyer=document.getElementById('buyer');
      var buyerID = buyer.options[buyer.selectedIndex].text;  
      document.getElementById('modalBuyer').value=buyerID;


      //update hidden feilds
      var buyer2=document.getElementById('buyer').value;
      document.getElementById('modalBid').value=buyer2;
      //console.log(document.getElementById('modalBid').value);
  }
// }

// *******  JQuery *******

//  form submit - INSERT
$(document).ready(function(){
  $('#updateBtn').click(function(event){
      event.preventDefault();
      var form = $('#auctionForm').serializeArray();
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
            for(var i=0;i<len;i++){
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