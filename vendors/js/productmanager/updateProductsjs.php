<script>
  
/// loading the pid for the first form
function loadPid(){
  //console.log("ada");
  var e = document.getElementById("productName");
  var val= e.options[e.selectedIndex].value;
  document.getElementById('pid').value=val;
}

/// getAll the details from the first form to the second
function loadModalName(element){

  var text = element.options[element.selectedIndex].text;
  document.getElementById('modalName').value=text;

}


// updating the db after pressing update button

$(document).ready(function() {
        $('#updateBtn').click(function(event) {
            // validateAmount();
            event.preventDefault();
            
            // var form = $('#auctionForm').serializeArray();
            

            // $('.error').remove();
            var productName = $('#productName option:selected').text();
            var amount = $('#amount').val();
            var pid = $('#pid').val();
            console.log(amount+pid);
            var action = 'save';
            
            //////////////////////////////////

            //var pid = $('#pid').val();
            //var amount = $('#amount').val();
            // var url1="http://localhost/Thekolaya/productmanager/getProductStock";
            // var availableStock=0;
            // var check=0;
            // $.ajax({
            //     url:url1,
            //     type:"GET",
            //     dataType:"JSON",
            //     // pass the pid to the controller and get the available stock for that product pid
            //     data:{pid:pid},
            //     success:function(data){
            //         availableStock=data[0].stock;
            //         console.log("amoubt:"+amount);
            //         console.log("availableStock:"+availableStock);
            //         if(amount>availableStock){
            //             console.log("Too much");
            //             check=1;
            //             $('#amount').parent().after("<p class=\"error\">*Cannot Exceed the stock</p>")

            //         }else{

            //         }
            //         console.log(data[0].stock);
            //     }
            // })



            /////////




            if (amount < 0) {
                // $('#amount').parent().after("<p class=\"error\">Amount cannot be negative</p>");
                $('#amount').parent().after("<p class=\"error\">*Amount cannot be negative</p>");
            } else if (amount == 0) {
                $('#amount').parent().after("<p class=\"error\">*Please insert a valid amount</p>")
            }
            

            if (amount <= 0) {
                return;
            }
            var str = "Product Name:  " + productName + "\n" +
                "Amount :   " + amount + "\n" +
                "Pid :"+pid+"\n";
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
</script>