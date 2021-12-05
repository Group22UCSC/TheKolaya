<script>
    
var table = document.getElementById('requeststbl');

for(var i = 1; i < table.rows.length; i++)
{
    table.rows[i].onclick = function()
    {
         //rIndex = this.rowIndex;
         document.getElementById("rid").value = this.cells[0].innerHTML;
         document.getElementById("lid").value = this.cells[1].innerHTML;
         document.getElementById("name").value = this.cells[2].innerHTML;
         document.getElementById("date").value = this.cells[3].innerHTML;
         document.getElementById("amount").value = this.cells[4].innerHTML;
    };
}

function getAdvanceRequests(){
    console.log("d");
    var url="http://localhost/Thekolaya/accountant/getAdvanceRequests";
    $.ajax({
        url:url,
        type:"GET",
        dataType:"JSON",
        success:function(data){
            console.log(data);
            var len=data.length;
            for(var i=0;i<len;i++){
                
                var deleteBtn=$("<button>Delete</button>");
                //console.log("year :"+year+"month :"+month+"date :"+date2);


               
                // Check Date and Set DELETE BUTTONS TO THE TABLE
                // if(thisYear==year && thisMonth==month && thisDate==date2){
                //     deleteBtn.appendTo("#actionCol");
                // }else{
                //     $("#actionCol").append("<td>No Action</td>");
                // }




                // const month=data.getMonth()+1
                // console.log(date);
                var str=
                "<tr class='row'>"+
                "<td>"+
                    data[i].date+
                "</td>"+   
                "<td>"+
                    year+
                "</td>"+   
                "<td>"+
                    month+
                "</td>"+
              
                "<td>"+
                    data[i].price+
                "</td>"+
                "<td class='actionCol'>"+
               // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +
                    
               "<button type='button' id='editbutton' onclick='deleteRow()' >" +
                 "Delete"+
                "</button>" +

                "</td>"+
                "</tr>";
                $("#teapricetable tbody").append(str);
                // there in the table DO NOT DEFINE <tbody> MANULLY
                //IF SO IT WILL SHOW THE RESULTS TWICE
            }
        }
    })
}
</script>