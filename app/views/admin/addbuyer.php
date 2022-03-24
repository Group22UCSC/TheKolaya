

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/addbuyer.css">



    
   <div class="middle">ADD NEW BUYER</div>

   <div class="middle-conatiner">

     <div class="name1">
     
            
          
   
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                      <table id="myTable">
                           <tr class="header">
                                <th style="width:33.33%;">ID</th>
                                <th style="width:33.33%;">Name</th>
                                <th style="width:33.33%;">Contact Number</th>
   
                            </tr>
                       <div class="vertical">
    
                               <?php
                               $x=count($data);
                               for($i=0;$i<$x;$i++){
                                 echo '<tr id="tea" data-href="">     
                                           <td>'.$data[$i]['buyer_id'].'</td>
                                           <td>'.$data[$i]['name'].'</td>
                                           <td>'.$data[$i]['contact_no'].'</td>
                                           
                                       </tr>';                
                               }       
                               ?>         

                          <?php
      if (empty($data)) {
        echo '<div id="not_display_collection_yet" style="border-radius: 0px; color:red; background-color: white;" class="table_header" >There is no tea collection to update</div>';
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
                    document.getElementById("buyer_id").value=this.cells[0].innerHTML;
                    
                      
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
     <a >ADD NEW BUYER</a> 
   </div>
  

<div class="k1">  
<div class="wrapper1">
    <div class="title">  Add new buyer form  </div>
      <form action="<?php echo URL?>admin/addbuyer" method="POST"  id="buyerForm">
       <div class="form">
              
               <div class="inputfield">
                 <label>Buyer ID</label>
                 <input type="text" name="buyer_id" id="buyer_id" class="input" >
               </div> 


               <div class="inputfield">
                 <label> Name</label>
                 <input type="text" name="name" id="name" class="input">
               </div> 

               <div class="inputfield">
                 <label>Phone number</label>
                 <input type="text" name="contact_no" id="contact_no" class="input" >
               </div>


      
               <div class="last">
                  <div class="b">
                   <input type="submit" value="Add Buyer" class="btn" id="addbuyerBtn">
                  </div>
         
     </form>
    </div>
  </div> 
</div>


<?php include 'js/admin/addbuyerjs.php';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<?php include 'bottom-container.php';?>