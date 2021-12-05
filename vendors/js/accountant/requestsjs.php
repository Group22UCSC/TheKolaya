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


// ..........
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
               
                var str=
                "<tr class='row' onclick='rowClick()'>"+
                "<td class='tdcls'>"+
                    data[i].request_id+
                "</td>"+   
                "<td>"+
                    data[i].lid+
                "</td>"+   
                "<td>"+
                    data[i].name+
                "</td>"+
              
                "<td>"+
                    data[i].request_date+
                "</td>"+
                "<td>"+
                    data[i].amount_rs+
                "</td>"+
            //     "<td class='actionCol'>"+
            //    // (thisYear==year && thisMonth==month && thisDate==date2)? "Delete":"No Action"; +
                    
            //    "<button type='button' id='editbutton' onclick='deleteRow()' >" +
            //      "Delete"+
            //     "</button>" +

            //     "</td>"+
                "</tr>";
                $("#requeststbl tbody").append(str);
                // there in the table DO NOT DEFINE <tbody> MANULLY
                //IF SO IT WILL SHOW THE RESULTS TWICE
            }
        }
    })
}



// when a row is clicked fill the details to the form automatically
function rowClick(){
    // remobe the row from ui
    $('#requeststbl tbody').on('click','tr',function(){
    //console.log("dd");
    // remobe the row from ui
    //$(this).closest('tr').remove();
    
    var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
    $date = $row.find("td:nth-child(1)"); // ist column value

    var date2=$date.text(); // date as a javascript variable
    console.log(date2);
    
    //check date and delete
    var todaysDate=new Date();        
    var thisMonth=todaysDate.getMonth()+1;
    var thisYear=todaysDate.getFullYear();


    });
   
}



</script>