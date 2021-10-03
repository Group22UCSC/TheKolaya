

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/viewAccount.css">



    
   <div class="middle">VIEW ACCOUNTS</div>

   <div class="middle-conatiner">

     <div class="name1">
     

         <!-- <div class="wrap"> -->
   <div class="search">
      <input type="text" class="searchTerm" placeholder="Enter User Name or ID?">
        <a href="<?php echo URL?>admin/viewAccount1"><button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button></a>
   </div>
</div>

         
       <!--  <label for="name">Name </label>
       <input type="text" name="name" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;search name"> -->
       <!-- <a href="<?php echo URL?>admin/deleteAccount1"><input type="submit" name="submit"></a> -->

    


     
<div class="table">


<div class="table-container">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Name</th>
                    <th class="thcls">ID</th>
                    <th class="thcls">User Type</th>
                   
                    <th class="thcls">Status</th>

                </tr>
            </thead>

            <!-- <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">January</td>
                <td class="tdcls">98</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr> -->

            <tbody>


                <tr>
                    <td class="tdcls"><a class="acls" href="#">Kumud Perera</a></td>
                    <td class="tdcls">001</td>
                    <td class="tdcls">Landowner</td>
                    <td class="tdcls">
                        <p class="status status-paid">select</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">Roneki Saranga</a></td>
                    <td class="tdcls">002</td>
                    <td class="tdcls">Landowner</td>
                  
                    <td class="tdcls">
                        <p class="status status-paid">select</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">Pasindu Melaka</a></td>
                    <td class="tdcls">003</td>
                    <td class="tdcls">Accountant</td>
                
                    <td class="tdcls">
                        <p class="status status-paid">select</p>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">Pasindu Lakmal</a></td>
                    <td class="tdcls">004</td>
                    <td class="tdcls">Landowner</td>
                    <td class="tdcls">
                        <p class="status status-paid">select</p>
                    </td>
                   
                </tr>
                <tr>
                    <td class="tdcls"><a class="acls" href="#">Sasindu Dias</a></td>
                    <td class="tdcls">005</td>
                    <td class="tdcls">Agent</td>
                    <td class="tdcls">
                        <p class="status status-paid">select</p>
                    </td>
                    

                </tr>
            </tbody>

        </table>
    </div>
</div>

      
     </div>

    
  </div>
<?php include 'bottom-container.php';?>