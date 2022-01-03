

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/viewPayments.css">


    
   <div class="middle">VIEW PAYMENTS</div>

   <div class="middle-conatiner">

     <div class="name1">
     
  
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                               
                                <th style="width:12.5%;">Landowner ID</th>
                                <th style="width:12.5%;">Landowner Name</th>
                                <th style="width:12.5%;" id="hide">To Date</th>
                                <th style="width:12.5%;" id="hide">From Date</th>
                                <th style="width:12.5%;" id="hide">Fertilizer Expenses</th>
                                <th style="width:12.5%;" id="hide">Advance Expenses</th>
                                <th style="width:12.5%;" id="hide">Income</th>
                                <th style="width:12.5%;">Final Payment</th>   
                                <th style="width:12.5%;" id="hide">Employee ID</th>                             
                               
                              
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="">
                                           <td>'.$data[$i]['lid'].'</td>
                                           <td>'.$data[$i]['name'].'</td>
                                           <td style id="hide">'.$data[$i]['toDate'].'</td>
                                           <td style id="hide">'.$data[$i]['fromDate'].'</td>
                                           <td style id="hide">'.$data[$i]['fertilizer_expenses'].'</td>
                                           <td style id="hide">'.$data[$i]['advance_expenses'].'</td>
                                           <td style id="hide">'.$data[$i]['income'].'</td>
                                           <td>'.$data[$i]['final_payment'].'</td>
                                           <td style id="hide">'.$data[$i]['emp_id'].'</td>
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
                      
                      document.getElementById("id").value=this.cells[0].innerHTML;
                      document.getElementById("toDate").value=this.cells[1].innerHTML;
                      document.getElementById("fromDate").value=this.cells[2].innerHTML;
                      document.getElementById("fertilizer_expenses").value=this.cells[3].innerHTML;
                      document.getElementById("advance_expenses").value=this.cells[4].innerHTML;
                      document.getElementById("income").value=this.cells[5].innerHTML;
                      document.getElementById("final_payment").value=this.cells[6].innerHTML;
                      document.getElementById("emp_id").value=this.cells[7].innerHTML;
                 
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
<a >VIEW PAYMENTS</a> </div>
  

<div class="k1">  
 <div class="wrapper1">
  <div class="title">  VIEW PAYMENT DETAILS  </div>
    
      <div class="form">

        <div class="inputfield">
          <label>LandOwner ID</label>
          <input type="text" class="input" name="lid" id="id" required readonly>
       </div> 

       <div class="inputfield">
          <label>To Date</label>
               <input type="text" class="input" name="toDate" id="toDate" required readonly>  
       </div>

        <div class="inputfield">
          <label>From Date</label>
               <input type="text" class="input" name="fromDate" id="fromDate" required readonly>  
       </div>

        <div class="inputfield">
          <label>Fertilizer Expences</label>
               <input type="text" class="input" name="fertilizer_expenses" id="fertilizer_expenses" required readonly>  
       </div>

        <div class="inputfield">
          <label>Advance Expences</label>
               <input type="text" class="input" name="advance_expenses" id="advance_expenses" required readonly>  
       </div>

        <div class="inputfield">
          <label>Income</label>
               <input type="text" class="input" name="income" id="income" required readonly>  
       </div>

      <div class="inputfield">
          <label>Final Payment</label>
               <input type="text" class="input" name="final_payment" id="final_payment" required readonly>  
       </div>

       <div class="inputfield">
          <label>Accountant ID</label>
          <input type="text" class="input" name="emp_id" id="emp_id" required readonly>
       </div> 

     
     </form>

    </div>

  </div> 
</div>



<?php include 'bottom-container.php';?>