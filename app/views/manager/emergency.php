

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
                      // document.getElementById("route_no").value=this.cells[1].innerHTML;
                
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
     <form action="<?php echo URL?>manager/emergency" method="POST">
      <div class="form">
        <div class="inputfield">
           <label>Agent ID</label>
           <input type="text" class="input" name="emp_id" id="emp_id" required readonly>
        </div> 

        <div class="inputfield">
            <label>Message</label>
            <textarea class="input" rows=5 columns=50 id="message" name="message" placeholder="Type your message here."></textarea>
        </div>      


       <div class="inputfield">
           <input type="submit" value="Send" class="btn" id="link">
       </div>
       </div> 
     </form>

    </div>

  </div> 
 </div> 

<?php include 'bottom-container.php';?>