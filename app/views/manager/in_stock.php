

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/manager/in_stock.css">

  
   <div class="middle">VIEW IN-STOCK DETAILS</div>

   <div class="middle-conatiner">

     <div class="name1">
     
  
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                                <th style="width:16.66%;">Date</th>
                                <th style="width:16.66%;">Type</th>                                
                                <th style="width:16.66%;" id="hide">Unit Price</th>
                                <th style="width:16.66%;" id="hide">Price for Amount</th>
                                <th style="width:16.66%;" id="hide">Quantity</th>
                                <th style="width:16.66%;" id="hide">Employee ID</th>
                               
                              
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="">
                                           <td>'.$data[$i]['in_date'].'</td>
                                           <td>'.$data[$i]['type'].'</td>
                                           <td style id="hide">'.$data[$i]['price_per_unit'].'</td>
                                           <td style id="hide">'.$data[$i]['price_for_amount'].'</td>
                                           <td style id="hide">'.$data[$i]['in_quantity'].'</td>
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
                      document.getElementById("date").value=this.cells[0].innerHTML;
                      document.getElementById("type").value=this.cells[1].innerHTML;
                      document.getElementById("unit_price").value=this.cells[2].innerHTML;
                      document.getElementById("total_price").value=this.cells[3].innerHTML;
                      document.getElementById("quantity").value=this.cells[4].innerHTML;
                      document.getElementById("id").value=this.cells[5].innerHTML;
                   
                 
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
<a >VIEW IN-STOCK DETAILS</a> </div>
  

<div class="k1">  
 <div class="wrapper1">
  <div class="title">  VIEW DETAILS  </div>
    
      <div class="form">

        <div class="inputfield">
           <label> In-Date</label>
           <input type="text" class="input" name="in_date" id="date" required readonly>
       </div> 


       <div class="inputfield">
          <label>In-stock Type</label>
               <input type="text" class="input" name="type" id="type" required readonly>  
       </div>

       <div class="inputfield">
          <label>Unit Price</label>
          <input type="text" class="input" name="price_per_unit" id="unit_price" required readonly>
       </div> 


       <div class="inputfield">
          <label>Price per Amount</label>
          <input type="text" class="input" name="price_for_amount" id="total_price" required readonly>
       </div> 

        <div class="inputfield">
          <label>In-Quantity</label>
          <input type="text" class="input" name="in_quantity" id="quantity" required readonly>
       </div> 

       <div class="inputfield">
          <label>Emp-ID</label>
          <input type="text" class="input" name="emp_id" id="id" required readonly>
       </div>       

     
     </form>

    </div>

  </div> 
</div>


      
   

<?php include 'bottom-container.php';?>