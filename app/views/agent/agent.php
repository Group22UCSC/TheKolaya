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
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/teacollection.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
<?php include 'topContainer.php';?>
<div class = "maindiv" id="blur">
<div class="notice">
<?php $x=5?>
   <h4 id="availablenotice">You have <?php echo $x?> landowners to collect <br>tea leaves today!</h4>
   <?php $y=4?>
   <h4 id="deliverynotice">You have <?php echo $y?> landowners to deliver <br>requested items today!</h4>
  
  </div>
  <div class="availablelist">    
    
    <h3 class ="availabletopic">Available  Landowner  List </h3>
    <table class = "availabletable" id="availabletable">
      <tr>
        <th>Landowner ID</th>
        <th>Container Estimation</th> 
        <th>Address</th>
        <th>Update</th>
        <th>Delete</th> 
              
        
      </tr>
      <?php
        for($i=1;$i<=$x;$i++){
          echo '<tr>
                    <td>L00'.$i.'</td>
                    <td>28</td>  
                    <td>Matara</td>                   
                    <td class="updatecol"><button class="update" onclick="openteaform()"><i class="far fa-edit"></i></button></td>
                    <td class="deletecol"><button class = "delete"><i class="fa fa-trash"></i></button></td>
                </tr>';                
        }       
      ?>         
    </table>    
      </div>
      
  <div class="deliverylist">
  
    <h3 class="deliverytopic">Request  Delivery  List </h3>
    <table class="deliverytable" id="deliverytable">
    <tr>
        <th>Landowner ID</th>
        <th>Request ID</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Update</th>
        <th>Delete</th>        
      </tr>
     
      <?php
        for($i=1;$i<=$y;$i++){
          echo '<tr ">
                    <td>L00'.$i.'</td>
                    <td>R'.$i.'</td>
                    <td>Firewood</td>
                    <td>28</td>
                    <td class="updatecol"><button class = "update" onclick="openrequestform()"><i class="far fa-edit"></i></button></td>
                    <td class="deletecol"><button class = "delete"><i class="fa fa-trash"></i></button></td>
                </tr>';                
        }
      ?>
    </table>
      </div>
      </div>
      <div class="forms">
    <?php  include 'deliverables.php';?>   
    <?php  include 'teaCollection.php';?>   
      </div>
      <?php include 'bottomContainer.php'?>


 <script>
//   document.addEventListener("DOMContentLoaded",() => {
//     const rows = document.querySelectorAll("tr[data-href]");
//     rows.forEach(row =>{
//         row.addEventListener("click", ()=>{
//             window.location.href = row.dataset.href;
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
                
function openteaform(){
  document.getElementById("teapopup").style.display = "block";
  var blur = document.getElementById('blur');
  blur.classList.toggle('active');
}

function closeteaform(){
  document.getElementById("teapopup").style.display = "none";
  var blur = document.getElementById('blur');
  blur.classList.toggle('close');
}

function openrequestform(){
  document.getElementById("requestpopup").style.display = "block";
  var blur = document.getElementById('blur');
  blur.classList.toggle('active');
}

function closerequestform(){
  document.getElementById("requestpopup").style.display = "none";
  var blur = document.getElementById('blur');
  blur.classList.toggle('close');
}



var index, table1 = document.getElementById('availabletable');
            for(var i = 1; i < table1.rows.length; i++)
           
            {
                table1.rows[i].cells[4].onclick = function()
                {
                    var c = confirm("do you want to delete this available row?");
                    if(c === true)
                    {
                        index = this.parentElement.rowIndex;
                        table1.deleteRow(index);
                        document.getElementById("availablenotice").innerHTML = "You have <?php echo $x-1;?> landowners to collect <br>tea leaves today!";
                    }
                    
                    //console.log(index);
                };
                
            }

            var index, table2 = document.getElementById('deliverytable');
            for(var i = 1; i < table2.rows.length; i++)
            {
                table2.rows[i].cells[5].onclick = function()
                {
                    var c = confirm("do you want to delete this request row?");
                    if(c === true)
                    {
                        index = this.parentElement.rowIndex;
                        table.deleteRow(index);
                        document.getElementById("deliverynotice").innerHTML = "You have <?php echo $y-1;?> landowners to deliver <br>requested items today!";
                    }
                    
                    //console.log(index);
                };
                
            }
// $(document).ready(function(){
//   $(document.table).on("click", "tr[data-href]", function(){
//     window.location.href = this.dataset.href;
//   });
// });


</script>
