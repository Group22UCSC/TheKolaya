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




function searchByDate(){
        // Declare variables
        // alert("sdd");
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchDate");
        filter = input.value.toUpperCase();
        table = document.getElementById("updateAuctionTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function clearDate(){
        input = document.getElementById("searchDate").value='';
        searchByDate();
    }
</script>