<script>
    
    function AuctionIncome30() { //get the income of last 30 days for the dashboard box
        // var pid = $('#pid').val();
        // var amount = $('#amount').val();
        // var availableStock = 0;
        var url = "http://localhost/Thekolaya/accountant/AuctionIncome30";
        var tot=0.0;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            
            success: function(data) {
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    tot=tot+parseFloat(data[i].sold_amount*data[i].sold_price)
                    
                }
                
                //auctionDash
                var s=document.getElementById("auctionDash").innerHTML=tot;
                console.log(tot);
                //console.log(data);
            }
        })
    }


    function expenses30() { //get the total expences of last 30 days for the dashboard box
        console.log("cal");
        // var pid = $('#pid').val();
        // var amount = $('#amount').val();
        // var availableStock = 0;
        var url = "http://localhost/Thekolaya/accountant/expenses30";
        var tot=0.0;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            
            success: function(data) {
                console.log(data);
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    if(data[i].price_for_amount){
                        tot=tot+parseFloat(data[i].price_for_amount);
                    }
                    if(data[i].final_payment){
                        tot=tot+parseFloat(data[i].final_payment);
                    }
                    //tot=tot+(data[i].sold_amount*data[i].sold_price)
                    
                }
                console.log(tot);
                document.getElementById("auctionExpenses").innerHTML=tot;

                
            }
        })
    }

    //calculate total profit
</script>