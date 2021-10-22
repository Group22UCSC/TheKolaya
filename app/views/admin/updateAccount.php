

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/updateAccount.css">



    
   <div class="middle">UPDATE ACCOUNTS</div>

   <div class="middle-conatiner">

     <div class="name1">
     
  
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                                <th style="width:33.33%;">Name</th>
                                <th style="width:33.33%;">ID</th>
                                <th style="width:33.33%;">Type</th>
   
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="'.URL.'/admin/updateAccount1">
                                           <td>'.$data[$i]['name'].'</td>
                                           <td>'.$data[$i]['user_id'].'</td>
                                           <td>'.$data[$i]['user_type'].'</td>
                                           
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
                                  



                                 <!-- script for view table -->
                                 <script>
                                   document.addEventListener("DOMContentLoaded",() => {
                                 const rows = document.querySelectorAll("tr[data-href]");
                                 rows.forEach(row =>{
                                     row.addEventListener("click", ()=>{
                                      // openteaform();
                         window.location.href=row.dataset.href;

                                     });
                                 });
                             });

                                        
                                 
                                 </script>


     </div>
    
  </div>
<?php include 'bottom-container.php';?>