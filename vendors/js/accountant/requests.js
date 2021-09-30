
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
