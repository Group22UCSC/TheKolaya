<script>
    var income=0;
    function AuctionIncome30() { //get the income of last 30 days for the dashboard box
        // var pid = $('#pid').val();
        // var amount = $('#amount').val();
        // var availableStock = 0;
        var url = "<?php echo URL ?>accountant/AuctionIncome30";
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
                let n=tot.toFixed(2);
                //auctionDash
                var s=document.getElementById("auctionDash").innerHTML=n;
                // console.log(tot);
                expenses30();
                //console.log(data);
            }
        })
        
    }

    function totSales30(){
        var url="<?php echo URL ?>accountant/totSales30";
        var totTea=0.0;
        $.ajax({
            url:url,
            type:"GET",
            dataType:"JSON",
            success: function(data) {
                // console.log(data);
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    if(data[i].sold_amount){
                        totTea=totTea+parseFloat(data[i].sold_amount);
                    }
                    
                    //tot=tot+(data[i].sold_amount*data[i].sold_price)
                    
                }
                // console.log(totTea);
                document.getElementById("totSales").innerHTML=totTea;
                
            }
        })
    }
    function expenses30() { //get the total expences of last 30 days for the dashboard box
        // console.log(income);
        // var pid = $('#pid').val();
        // var amount = $('#amount').val();
        // var availableStock = 0;
        var url = "<?php echo URL ?>accountant/expenses30";
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
                    if(data[i].price_for_amount){ // adding fertilizer expenses
                        tot=tot+parseFloat(data[i].price_for_amount);
                    }
                    if(data[i].final_payment){ // adding payments 
                        tot=tot+parseFloat(data[i].final_payment);
                    }
                    //tot=tot+(data[i].sold_amount*data[i].sold_price)
                    
                }
                let n=tot.toFixed(2);
                console.log(n);
                document.getElementById("auctionExpenses").innerHTML=n;
                // var profit=income-tot;
                profit30();
            }
        })
        
    }

    //calculate total profit
    function profit30(){
        // console.log(profit);
        var prof=0.0;
        var exp=parseFloat( document.getElementById("auctionExpenses").textContent);
        var auctionIncome=parseFloat(document.getElementById("auctionDash").textContent);
        //console.log(exp);
        prof=auctionIncome-exp;
        let n=prof.toFixed(2);
        document.getElementById("totProfit").innerHTML=n;
    }
</script>