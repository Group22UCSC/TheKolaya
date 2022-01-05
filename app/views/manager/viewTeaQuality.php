

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/viewTeaQuality.css">
 

    
   <div class="middle">VIEW TEA QUALITY</div>

   <div class="middle-conatiner">

     <div class="name1">
     
          
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                                <th style="width:16.66%;">Name</th>
                                <th style="width:16.66%;">ID</th>
                                <th style="width:16.66%;">Type</th>
                               
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                  echo '<tr id="tea" data-href-tea="">
                                           <td>'.$data[$i]['name'].'</td>
                                           <td>'.$data[$i]['user_id'].'</td>
                                           <td>'.$data[$i]['landowner_type'].'</td>
                                          
                                           
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


<div class="forms">
    <?php include 'viewTeaQuality1.php'; ?>      
</div>
<?php include 'bottom-container.php';?>