<script>
    
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
</script>