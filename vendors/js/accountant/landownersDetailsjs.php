<script>
    
// * get auction table - SELECT
<?php $dateToday=date("Y-m-d"); ?>
function getLandonwerTable(){
    var url="http://localhost/Thekolaya/accountant/getLandonwerTable";
    $.ajax({
        url:url,
        type:"GET",
        dataType:"JSON",
        success:function(data){
            console.log(data);
            var len=data.length;
            for(var i=0;i<len;i++){
               var date=data[i].date;
                var str=
                "<tr class='row'>"+
                "<td>"+
                    data[i].user_id+
                "</td>"+
                "<td>"+
                    data[i].name+
                "</td>"+
                "<td>"+
                    data[i].contact_number+
                "</td>"+
                "<td>"+
                    data[i].address+
                "</td>"+
            
                "<td class='actionCol'>"+
               // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +
                    
               "<button type='button' id='editbutton' onclick='deleteRow()' >" +
                 "View Details"+
                "</button>" +

                "</td>"+
                    //<button id="tblbtn" class="tblbutton" onclick="location.href='<?php echo URL?>/accountant/landownersGraphpage';">View Deatils</button>
                "</tr>";
                $("#teapricetable tbody").append(str);
                // there in the table DO NOT DEFINE <tbody> MANULLY
                //IF SO IT WILL SHOW THE RESULTS TWICE
            }
            
        }
    })

}
</script>