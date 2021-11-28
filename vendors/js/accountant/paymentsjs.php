<script>


  /// loading the pid for the first form
  
 
//  form submit - INSERT
$(document).ready(function(){
  $('#submitbtn').click(function(event){
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



</script>