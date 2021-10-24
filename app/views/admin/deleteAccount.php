

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/deleteAccount.css">



    
   <div class="middle">DELETE ACCOUNTS</div>

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
                                 echo '<tr id="tea" data-href="">     
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




     <div class="middle1"> 
     <a >DELETE ACCOUNTS</a> </div>
  

  <div class="k1">  

<div class="wrapper1">
    <div class="title">  Delete Form  </div>

    <div class="form">
      
        <div class="inputfield">
          <label> Name</label>
          <input type="text" class="input">
       </div> 

        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input">
       </div> 

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea"></textarea>
       </div> 

        <div class="inputfield">
          <label>Type(Landowner/Employee)</label>
          <input type="text" class="input">
       </div>

        <div class="inputfield">
          <label>Phone number</label>
          <input type="text" class="input">
       </div>

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input">
       </div>  

       <div class="inputfield">
          <a>If you want to delete the account</a>
      
       </div> 

      
      <div class="last">
            <div class="a">
       <a href="<?php echo URL?>admin/deleteAccount"><input type="submit" value="Discard" class="btn"></a>
      </div>


       <div class="b">
        <input type="submit" value="Delete" class="btn">
      </div>
           

      </div>

     

    </div>

  </div> 
</div>


<?php include 'bottom-container.php';?>