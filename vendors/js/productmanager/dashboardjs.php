<script>
    
    function AuctionIncome30() {
        // var pid = $('#pid').val();
        // var amount = $('#amount').val();
        // var availableStock = 0;
        var url = "http://localhost/Thekolaya/productmanager/AuctionIncome30";
        var tot=0;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            // pass the pid to the controller and get the available stock for that product pid
            
            success: function(data) {
                var len = data.length;
                //    $('#updateAuctionTable not(tbody)').empty();
                //$("#updateAuctionTable").trigger("reset");
                // $('updateAuctionTable').children( 'tr:not(:first)' ).remove();
                for (var i = 0; i < len; i++) {
                    tot=tot+(data[i].sold_amount*data[i].sold_price)
                    
                }
                console.log(tot);
                console.log(data);
            }
        })
    }
</script>