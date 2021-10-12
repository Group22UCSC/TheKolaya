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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>                
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>

<div class="deliverylist">
  
    <h3 class="deliverytopic">Request  Delivery  List </h3>
    <table class="deliverytable" id="deliverytable">
    <tr>
        <th>Landowner ID</th>
        <th>Request ID</th>
        <th>Type</th>
        <th>Amount</th>            
      </tr>
     
      <?php
      $y=4;
        for($i=1;$i<=$y;$i++){
          echo '<tr  id = "request" data-href-request="" >
                    <td>L00'.$i.'</td>
                    <td>R'.$i.'</td>
                    <td>Firewood</td>
                    <td>28</td>                                      
                </tr>';                
        }
      ?>
    </table>
      </div>

<?php include 'deliveryform.php';?>

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
var table = document.getElementById('deliverytable');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("rid").value = this.cells[1].innerHTML;                         
                    };
                }

</script>