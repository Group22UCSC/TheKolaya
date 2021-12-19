

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/emergency.css">


    
   <div class="middle">SEND EMERGENCY MESSAGES</div>

   <div class="middle-conatiner">

     <div class="name1">
     
  
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                                <th style="width:33.33%;">ID</th>
                                <th style="width:33.33%;">Route number</th>
                                <th style="width:33.33%;" id="hide">Availability</th>
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="">
                                           <td>'.$data[$i]['emp_id'].'</td>
                                           <td>'.$data[$i]['route_no'].'</td>
                                           <td style id="hide">'.$data[$i]['availability'].'</td>
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
                      document.getElementById("emp_id").value=this.cells[0].innerHTML;
                      document.getElementById("route_no").value=this.cells[1].innerHTML;
                
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
<a >EMERGENCY MESSAGES</a> </div>
  

<div class="k1">  
 <div class="wrapper1">
  <div class="title">  EMERGENCY DETAILS FORM </div>
    
      <div class="form">

        <div class="inputfield">
           <label>Agent ID</label>
           <input type="text" class="input" name="emp_id" id="emp_id" required readonly>
       </div> 

        <div class="inputfield">
          <label>Route Number</label>
          <input type="text" class="input" name="user_id" id="id" required readonly>
       </div> 

       <div class="inputfield">
          <label>User Type</label>
               <input type="text" class="input" name="user_type" id="user_type" required readonly>  
       </div>

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" id="address" required readonly></textarea>
       </div> 


        <div class="inputfield">
          <label>Contact Number</label>
            <input type="tel" class="input" name="contact_number" id="contact_number" required readonly>
       </div>
<!-- 
        <div class="inputfield">
          <label>Account Create Date</label>
            <input type="CURRENT_TIMESTAMP()" class="input" name="created_at" id="created_at" required readonly>
       </div>
 -->

     
     </form>

    </div>

  </div> 
</div>



<?php include 'bottom-container.php';?>