<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/dashboard.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
<?php include 'topContainer.php';?>
<div id="overlay"></div>
  <div class = "topic"><h3>My Dashboard</h3></div>
<div class="notice">
<?php $x=count($data);?>
   <div class = "avanot"><?php echo $x?> landowners to collect <br>tea leaves!</div>
   <?php $y=4?>
   <div class="delnot"><?php echo $y?> landowners to deliver <br>requests!</div>
  
  </div>
  <div class="availablelist">    
    
    <div class ="availabletopic">Available  Landowner  List </div>
    <div style="overflow-x:auto; overflow-y:auto;">
    <table class = "availabletable" id="availabletable">      
      <tr>
        <td class="th">Landowner ID</td>
        <td class="th">Container Estimation</td> 
        <!--<th>Address</th>    -->                          
      </tr>
      <?php

        for($i=0;$i<$x;$i++){
          echo '<tr id="tea" data-href-tea="">
                    <td>'.$data[$i]['user_id'].'</td>
                    <td>'.$data[$i]['no_of_estimated_containers'].'</td>
                    
                </tr>';                
        }       
      ?>         
    </table>
      </div>    
  
      
  <!-- <div class="deliverylist">
  
    <h3 class="deliverytopic">Request  Delivery  List </h3>
    <table class="deliverytable" id="deliverytable">
    <tr>
        <th>Landowner ID</th>
        <th>Request ID</th>
        <th>Type</th>
        <th>Amount</th>            
      </tr> -->
     
      
    <!-- </table>
      </div> -->
      </div>
      <div class="forms">
   
    <?php  include 'teaCollection.php';?>       
      </div>
      <?php  include 'popup.php';?>        
      <?php include 'bottomContainer.php'?>


 <script>
  document.addEventListener("DOMContentLoaded",() => {
    const rows = document.querySelectorAll("tr[data-href-tea]");
    rows.forEach(row =>{
        row.addEventListener("click", ()=>{
         openteaform();
         

        });
    });
});



// document.addEventListener("DOMContentLoaded",() => {
//     const rows = document.querySelectorAll("tr[data-href-request]");
//     rows.forEach(row =>{
//         row.addEventListener("click", ()=>{
//          openrequestform();
//         });
//     });
// });

var table = document.getElementById('availabletable');
                
for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("lid").value = this.cells[0].innerHTML;                         
                    };
                }
    
                var table = document.getElementById('deliverytable');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("rid").value = this.cells[1].innerHTML;                         
                    };
                }

// function teatoggle()
// {
//   console.log("hello");
//   document.getElementById("teapopup").style.display = "block";
//   var blur = document.getElementById('blur');
//   blur.classList.toggle('active');
  
//   var blur = document.getElementById('teapopup');
//   blur.classList.toggle('active');
// }

function openteaform(){
  document.getElementById("teapopup").style.display = "block";
  document.getElementById("overlay").style.display = "block";
  //console.log("before blur");
  // var blur = document.getElementById('blur');
  // blur.classList.toggle('active');
  //console.log("after blur");
}

function closeteaform(){
  document.getElementById("teapopup").style.display = "none";
  document.getElementById("overlay").style.display = "none";
  //console.log("before blur back");
  // var blur = document.getElementById('blur');
  // blur.classList.toggle('closeblur');
  //console.log("after blur back");
}

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



// var index, table1 = document.getElementById('availabletable');
//             for(var i = 1; i < table1.rows.length; i++)
           
//             {
//                 table1.rows[i].cells[4].onclick = function()
//                 {
//                     var c = confirm("do you want to delete this available row?");
//                     if(c === true)
//                     {
//                         index = this.parentElement.rowIndex;
//                         table1.deleteRow(index);
//                         document.getElementById("availablenotice").innerHTML = "You have <?php echo $x-1;?> landowners to collect <br>tea leaves today!";
//                     }
                    
//                     //console.log(index);
//                 };
                
//             }

//             var index, table2 = document.getElementById('deliverytable');
//             for(var i = 1; i < table2.rows.length; i++)
//             {
//                 table2.rows[i].cells[5].onclick = function()
//                 {
//                     var c = confirm("do you want to delete this request row?");
//                     if(c === true)
//                     {
//                         index = this.parentElement.rowIndex;
//                         table.deleteRow(index);
//                         document.getElementById("deliverynotice").innerHTML = "You have <?php echo $y-1;?> landowners to deliver <br>requested items today!";
//                     }
                    
//                     //console.log(index);
//                 };
                
//             }
function openpopup(){
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() { 
  modal.style.display = "block";
  var x = document.getElementById("lid").value;  
  document.getElementById("lid-pop").value = x;
  var y = document.getElementById("weight").value;  
  document.getElementById("weight-pop").value = y;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
}
function closepopup(){
  document.getElementById("myModal").style.display = "none";
  //  var blur = document.getElementById('blur');
  // blur.classList.toggle('maindiv');
}

function closeformpopup(){
  document.getElementById("myModal").style.display = "none";
  closeteaform();
  //document.getElementById("availableTable").deleteRow(1);
  
}

</script>
