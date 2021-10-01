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
<div class="tables">
  <div class="availablelist">
    <?php $x=4?>
   <h4>You have <?php echo $x?> landowners to collect <br>tea leaves today!</h4>
    <h3 class ="availabletopic">Available Landowner List </h3>
    <table class = "availabletable" id="table">
      <tr>
        <th>Landowner <br> ID</th>
        <th>Container <br>Estimation</th>
      </tr>
      <?php
        for($i=1;$i<=$x;$i++){
          echo '<tr data-href ="Agent/updateTeaWeight">
                    <td>L00'.$i.'</td>                                    
                    <td>28</td>
                </tr>';                
        }
      ?>
      
    </table>
  </div>
  <div class="deliverylist">
  <?php $x=3?>
   <h4>You have <?php echo $x?> landowners to deliver <br>requested items today!</h4>
    <h3 class="deliverytopic">Delivery List </h3>
    <table class="deliverytable">
    <tr>
        <th>Landowner ID</th>
        <th>Request ID</th>
        <th>Type</th>
        <th>Amount</th>
        
      </tr>
     
      <?php
        for($i=1;$i<=$x;$i++){
          echo '<tr data-href ="Agent/confirmDeliverables">
                    <td>L00'.$i.'</td>
                    <td>R'.$i.'</td>
                    <td>Firewood</td>
                    <td>28</td>
                </tr>';                
        }
      ?>
    </table>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded",() => {
    const rows = document.querySelectorAll("tr[data-href]");
    rows.forEach(row =>{
        row.addEventListener("click", ()=>{
            window.location.href = row.dataset.href;
        });
    });
});


// $(document).ready(function(){
//   $(document.table).on("click", "tr[data-href]", function(){
//     window.location.href = this.dataset.href;
//   });
// });

/*
const mytable = document.getElementById("table");

mytable.addEventListener("click", function(e){
  const target = e.target;

  if(target.matches("tr[data-href]")){
    window.location.href=target.dataset.href;
  }
})
*/
</script>
<?php include 'bottomContainer.php';?>