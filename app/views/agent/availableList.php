<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/availablelist.css"> 
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/searchbar.css">
    <script src="<?php echo URL?>vendors/js/agent/dashboard.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <!-- Boxicons CDN Link -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
<?php include 'topContainer.php';?>
<?php 
if ($data!=0){
  $x = count($data);
}
else{
  $x="0";
}
?>
<div class="topic">Tea Available Landowner List </div>
<form class="searchform">    
    <input type="text" id="search" placeholder="Enter Landowner ID.." onkeyup="searchTable()">
    <!-- <input type="submit" value="search" id="submit"> -->
</form>
<div class="availablelist">       
    <div style="overflow:auto;">
    <table class = "availabletable" id="availabletable">      
      <tr>
        <td class="th">Landowner ID</td>
        <td class="th">Container Estimation</td>                                 
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
</div>

<?php include 'bottomContainer.php';?>
<div class="forms">   
    <?php  include 'teaCollection.php';?>       
      </div>
      <?php  include 'popup.php';?>    
      
<script>
 var table = document.getElementById('availabletable');
                 
 for(var i = 1; i < table.rows.length; i++)
                 {
                     table.rows[i].onclick = function()
                     {
                          //rIndex = this.rowIndex;
                          document.getElementById("lid").value = this.cells[0].innerHTML;                         
                     };
                 }

  function searchTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("search");
      filter = input.value.toUpperCase();
      table = document.getElementById("availabletable");
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
 