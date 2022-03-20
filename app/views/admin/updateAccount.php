

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/updateAccount.css">



    
   <div class="middle">UPDATE ACCOUNTS</div>

   <div class="middle-conatiner">

     <div class="name1">
     
  
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                                <th style="width:16.66%;">Name</th>
                                <th style="width:16.66%;">ID</th>
                                <th style="width:16.66%;">Type</th>
                                <th style="width:16.66%;" id="hide">Address</th>
                                <th style="width:16.66%;" id="hide">Contact number</th>
                                <th style="width:16.66%;" id="hide">Password</th>
                               
                              
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="">
                                           <td>'.$data[$i]['name'].'</td>
                                           <td>'.$data[$i]['user_id'].'</td>
                                           <td>'.$data[$i]['user_type'].'</td>
                                           <td style id="hide">'.$data[$i]['address'].'</td>
                                           <td style id="hide">'.$data[$i]['contact_number'].'</td>
                                           <td style id="hide">'.$data[$i]['password'].'</td>
                                           
                                           
                                       </tr>';                
                               }       
                               ?>         



                        </div>
  
                      </table>


                            
            <!-- table data get auto filled form -->
            <script>

              var table=document.getElementById('myTable'),rIndex;
              for (var i = 1; i < table.rows.length; i++) {
                   table.rows[i].onclick=function()
                   {
                    //rIndex=this.rowIndex;
                      document.getElementById("name").value=this.cells[0].innerHTML;
                      document.getElementById("id").value=this.cells[1].innerHTML;
                      document.getElementById("user_type").value=this.cells[2].innerHTML;
                      document.getElementById("address").value=this.cells[3].innerHTML;
                      document.getElementById("contact_number").value=this.cells[4].innerHTML;
                      // document.getElementById("password").value=this.cells[5].innerHTML;
                   
                 
                   };
                 }


            </script>       





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
     <a >UPDATE ACCOUNTS</a> </div>
  

<div class="k1">  
 <div class="wrapper1">
  <div class="title">  Update Form  </div>
    
    <form action="<?php echo URL?>admin/updateAccount" method="POST" id="updateForm">
      <div class="form">

        <div class="inputfield">
           <label> Name</label>
           <input type="text" class="input" name="name" id="name"  placeholder="<?php (!empty($data['name_err'])) ? print $data['name_err'] : print ''; ?>"  required>
       </div> 

        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input" name="user_id" id="id" required readonly>
       </div> 

       <div class="inputfield">
          <label>User Type</label>
               <input type="text" class="input" name="user_type" id="user_type" required>  
       </div>

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" id="address" required></textarea>
       </div> 


        <div class="inputfield">
          <label>Contact Number</label>
            <input type="tel" class="input" name="contact_number" id="contact_number" required>
       </div>

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="password" id="password" placeholder="<?php (!empty($data['password_err'])) ? print $data['password_err'] : print ''; ?>" required>
       </div>  

       <div class="inputfield">
            <label>Confirm Password</label>
            <input type="password" class="input" name="confirm_password" id="confirm_password"  placeholder="<?php (!empty($data['confirm_password_err'])) ? print $data['confirm_password_err'] : print ''; ?>" required>
         </div>

       <div class="inputfield">
          <a>If you want to update the account</a>
      
       </div> 

      
      <div class="last">
            <div class="a">
       <input type="submit" value="Update" class="btn" id="updateAccountBtn">
       <!-- <button  onclick="previousPrices();scrollFunc();">Previous Tea Prices</button> -->
      </div>


      <!--  <div class="b">
         <a href="<?php echo URL?>admin/admin"><input  value="Discard" class="btn"></a>
      </div>
            -->

      </div>

     </form>

    </div>

  </div> 
</div>


<?php include 'js/admin/updatejs.php';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<?php include 'bottom-container.php';?>