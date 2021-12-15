<script>
  /// loading the pid for the first form


  //  form submit - INSERT
  $(document).ready(function() {
    $('#submitbtn').click(function(event) {
      //   event.preventDefault();

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
              action: action,
              amount: amount,
              pid: pid,
              price: price,
              bid: bid,
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


  document.querySelector('#lid').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      var year = document.getElementById("year").value;
      var month = document.getElementById("month").value;
      var lid = document.getElementById("lid").value;
      //alert(lid);

      // get the name of the landowner
      var url1 = "http://localhost/Thekolaya/accountant/getLandownerNamePayment";
      $.ajax({
        url: url1,
        type: "POST",
        dataType: "JSON",
        data: {
          year:year,
          month:month,
          lid: lid,
        },
        success: function(data) {
          var len = data.length;
          var tot=0.0;
          var monthlyPrice=0.0;
          console.log(data);
          if (len == undefined) { // if len==undefined from that LID 
            document.getElementById("lname").value = "No Landowner Found";
          } else { //if found
            document.getElementById("lname").value = data[0].name;
            document.getElementById("lastPaidDate").value = data[1].toDate;
            
            //console.log();
            for(var i=0;i<len;i++){ // calculate the gross income
              
              if(parseFloat(data[i]['net_weight'])>0){
                tot+=parseFloat(data[i].net_weight);
              }
              if(parseFloat(data[i]['price'])>0){
                monthlyPrice=parseFloat(data[i].price);
              }
            }
            
            document.getElementById("grossIncome").value = monthlyPrice*tot;
          }
          console.log(tot);
          
        },
          error: function(xhr, ajaxOptions, thrownError) {
              Swal.fire({
                icon: 'error',
                title: 'User not found',
                text: 'Enter a valid Lid' ,
                // footer: '<a href="">Why do I have this issue?</a>'
              })
            }

      });
      /*
      let lastPaidDate = '';
      //get last payment date
      var url3 = "http://localhost/Thekolaya/accountant/getLastPaymentDate";
      $.ajax({
        url: url3,
        type: "POST",
        dataType: "JSON",
        data: {

          lid: lid,
        },
        success: function(data) {
          document.getElementById("lastPaidDate").value = data[1].toDate;
          lastPaidDate = data[0].toDate;
          //setVal(lastPaidDate);
          //console.log(lastPaidDate);
        }

      });
      console.log(lastPaidDate);
      */
      // let lastPaidDate=document.getElementById("lastPaidDate").value;
      //get the gross income of the landowner
      /*
      var url2="http://localhost/Thekolaya/accountant/getGrossIncome";
      $.ajax({
          url:url2,
          type:"POST",
          dataType:"JSON",
          data: {
                year:year,
                month:month,
                lid:lid,
                
          },
          success:function(data){

            //document.getElementById("grossIncome").value=data[0].name;
            console.log(data);
          }

      }); 
      */


      
    }
  });

  function setVal(data) {
    console.log(lastPaidDate);
    
  }
</script>