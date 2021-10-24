<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">  
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/deliverylist.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/searchbar.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>                
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
<div class="topic">Request  Delivery  List </div>
<div class="deliverylist">
    <div class = fertilizer_topic> Fertilizer </div>
    <form class="searchform">    
    <input type="text" id="searchf" placeholder="Enter Landowner ID.." onkeyup="searchFertilizerTable()">
    <!-- <input type="submit" value="search" id="submit"> -->
</form>
    <table class="fertilizer_delivery_table" id="fertilizer_delivery_table">
    <tr>
    <td class="th">Landowner ID</td>
    <td class="th">Request ID</td>
    <!-- <td class="th">Type</td> -->
    <td class="th">Amount</td>            
      </tr>
      <?php
      if ($data1!=0){
        $f = count($data1);
      }
      else{
        $f="0";
      }
        
      // print_r($y);
        for($i=0;$i<$f;$i++){
          echo '<tr  id = "request" data-href-request="" >
                    <td>'.$data1[$i]['lid'].'</td>                   
                    <td>'.$data1[$i]['request_id'].'</td>
                    <td>'.$data1[$i]['amount'].'</td> 
                </tr>';                
        }
      ?>
    </table>
      </div>
      <div class="deliverylist">
      <div class = advance_topic> Advance </div>
      <form class="searchform">    
    <input type="text" id="searcha" placeholder="Enter Landowner ID.." onkeyup="searchAdvanceTable()">
    <!-- <input type="submit" value="search" id="submit"> -->
</form>
    <table class="advance_delivery_table" id="advance_delivery_table">
    <tr>
    <td class="th">Landowner ID</td>
    <td class="th">Request ID</td>    
    <td class="th">Amount</td>            
      </tr>
     
      <?php
      if ($data2!=0){
        $a = count($data2);
      }
      else{
        $a="0";
      }
      // print_r($y);
        for($i=0;$i<$a;$i++){
          echo '<tr  id = "request" data-href-request="" >
          <td>'.$data2[$i]['lid'].'</td>                   
          <td>'.$data2[$i]['request_id'].'</td>
          <td>'.$data2[$i]['amount_rs'].'</td> 
                </tr>';                
        }
      ?>
    </table>
      </div>

<?php include 'deliveryform.php';?>
<?php  include 'deliverypopup.php';?>   
<?php include 'bottomContainer.php';?>
<script>

  document.addEventListener("DOMContentLoaded",() => {
    const rows = document.querySelectorAll("tr[data-href-request]");
    rows.forEach(row =>{
        row.addEventListener("click", ()=>{
         openrequestform();
        });
    });
});

function openrequestform(){
  document.getElementById("requestpopup").style.display = "block";
  // var blur = document.getElementById('blur');
  // blur.classList.toggle('active');
}

function closerequestform(){
  document.getElementById("requestpopup").style.display = "none";
  // var blur = document.getElementById('blur');
  // blur.classList.toggle('close');
}
var table1 = document.getElementById('fertilizer_delivery_table');
                
                for(var i = 1; i < table1.rows.length; i++)
                {
                    table1.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("rid").value = this.cells[1].innerHTML;  
                         document.getElementById("lid").value = this.cells[0].innerHTML;  
                         document.getElementById("rtype").value = "Fertilizer";  
                         document.getElementById("amount").value = this.cells[2].innerHTML;  
                                                 
                    };
                }

                var table2 = document.getElementById('advance_delivery_table');
                
                for(var i = 1; i < table2.rows.length; i++)
                {
                    table2.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("rid").value = this.cells[1].innerHTML;  
                         document.getElementById("lid").value = this.cells[0].innerHTML;  
                         document.getElementById("rtype").value = "Advance";  
                         document.getElementById("amount").value = this.cells[2].innerHTML;  
                                                 
                    };
                }

                function openpopup(){
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
 
  modal.style.display = "block";
  var a = document.getElementById("rid").value;  
  document.getElementById("rid-pop").value = a;
  var b = document.getElementById("lid").value;  
  document.getElementById("lid-pop").value = b;
  var c = document.getElementById("rtype").value;  
  document.getElementById("rtype-pop").value = c;
  var d = document.getElementById("amount").value;  
  document.getElementById("amount-pop").value = d;


// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }

}
function closepopup(){
  document.getElementById("myModal").style.display = "none";
  //  var blur = document.getElementById('blur');
  // blur.classList.toggle('maindiv');
  
}

function closeformpopup(){
  document.getElementById("myModal").style.display = "none";
  closerequestform();
  
  //document.getElementById("availableTable").deleteRow(1);
  
}

// function clearWeight(){   
//     document.getElementById("weight").value=" ";
//   }

function searchAdvanceTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searcha");
      filter = input.value.toUpperCase();
      table = document.getElementById("advance_delivery_table");
      tr = table.getElementsByTagName("tr");
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

function searchFertilizerTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchf");
      filter = input.value.toUpperCase();
      table = document.getElementById("fertilizer_delivery_table");
      tr = table.getElementsByTagName("tr");
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

</script>