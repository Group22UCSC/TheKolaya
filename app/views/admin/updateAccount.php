

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
     <a >UPDATE ACCOUNTS</a> </div>
  

  <div class="k1">  

<div class="wrapper1">
    <div class="title">  Update Form  </div>

    
      
<form action="<?php echo URL?>admin/updateAccount1" method="POST">
      <div class="form">

        <div class="inputfield">
          <label> Name</label>
           <input type="text" class="input" name="name" required>
       </div> 

        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input" name="user_id" required>
       </div> 

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" required></textarea>
       </div> 

       <div class="inputfield">
            <label>User Type</label>
           <select class="type" id="type" name="user_type" required>
               <option value="accountant">Accountant</option>
               <option value="admin">Admin</option>
               <option value="manager">Manager</option>
               <option value="supervisor">Supervisor</option>
               <option value="product_manager">Product Manager</option>
            </select>
         </div>

        <div class="inputfield">
          <label>Contact Number</label>
            <input type="tel" class="input" name="contact_number" required>
       </div>

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="password" required>
       </div>  

       <div class="inputfield">
            <label>Confirm Password</label>
            <input type="password" class="input" name="confirm_password" required>
         </div>

       <div class="inputfield">
          <a>If you want to update the account</a>
      
       </div> 

      
      <div class="last">
            <div class="a">
       <a href="<?php echo URL?>admin/updateAccount1"><input type="submit" value="Discard" class="btn"></a>
      </div>


       <div class="b">
        <input type="submit" value="Update" class="btn">
      </div>
           

      </div>

     </form>

    </div>

  </div> 
</div>



<?php include 'bottom-container.php';?>