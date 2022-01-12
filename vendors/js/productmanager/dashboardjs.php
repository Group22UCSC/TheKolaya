<script>
    
    function AuctionIncome30() {
        // var pid = $('#pid').val();
        // var amount = $('#amount').val();
        // var availableStock = 0;
        var url = "<?php echo URL ?>productmanager/AuctionIncome30";
        var tot=0;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            
            success: function(data) {
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    tot=tot+(data[i].sold_amount*data[i].sold_price)
                    
                }
                
                //auctionDash
                var s=document.getElementById("auctionDash").innerHTML=tot;
                console.log(tot);
                console.log(data);
            }
        })
    }


    //sold tea stock
    function totSales30(){
        var url="<?php echo URL ?>productmanager/totSales30";
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
                
                document.getElementById("soldtea30").innerHTML=totTea;
                
            }
        })
    }

    //total tea stock avialble - dashboard box
    function totTeaStockNow(){
        var url="<?php echo URL ?>productmanager/totTeaStockNow";
        var totTea=0.0;
        $.ajax({
            url:url,
            type:"GET",
            dataType:"JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    totTea=totTea+parseFloat(data[i].stock);
                }                
                document.getElementById("totTeaStock").innerHTML=totTea;
                
            }
        })
    }

</script>