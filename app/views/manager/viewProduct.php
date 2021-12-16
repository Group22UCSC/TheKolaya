

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/viewProduct.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

     
   <div class="middle">VIEW PRODUCT IN-STOCK DETAILS</div>

   <div class="middle-conatiner">

     <div class="name1">
     
  
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                               
                                <th style="width:33.3%;">Product ID</th>
                                <th style="width:33.3%;">Date</th>
                                <th style="width:33.3%;">Amount</th>
                              
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="">
                                           <td>'.$data[$i]['products_id'].'</td>
                                           <td>'.$data[$i]['date'].'</td>
                                           <td>'.$data[$i]['amount'].'</td>
                                       </tr>';                
                               }       
                               ?>         



                        </div>
  
                      </table>
  

            <!--  // script for filtering -->
              <script>
              function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
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
                                  
    </div>
    
  </div>



 <div class="middle1"> 
      <a >VIEW REMAINING PRODUCT STOCK </a> </div>
  

<div class="graph-container2">

      <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
      <?php include 'js/manager/dashboard-chart2.php' ?>
</div>

   

<?php include 'bottom-container.php';?>