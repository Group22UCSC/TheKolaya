

<?php include '../app/views/admin/top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/create_Account.css">


     <div class="middle"> 
     <a >CREATE ACCOUNTS</a> </div>
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable">
                <tr class="trcls">
                    <th class="thcls">ID</th>
                    <th class="thcls">Contact number</th>
                    <th class="thcls">User Type</th>
                </tr>
           
                <?php
            $x = count($data);
            for($i = 0; $i < $x; $i++) {
            
                 echo'<tr>
                    <td class="tdcls">'.$data[$i]['user_id'].'</td>
                    <td class="tdcls">'.$data[$i]['contact_number'].'</td>
                    <td class="tdcls">'.$data[$i]['user_type'].'</td>
                     </tr>';
                    
            }
          ?>

    
        </table>
    </div>


</div>











<?php $_SESSION['account_type'] = 'agentLandFull'?>
  <div class="k1">
<div class="wrapper11">
    <div class="title">
     Registration Form
    </div>
   <form action="<?php echo URL?>admin/create_account" method="POST">
      <div class="form">
         <div class="inputfield">
            <label> Name</label>
            <input type="text" class="input" name="name" required>
         </div> 

         <div class="inputfield">
            <label>Uesr ID</label>
            <input type="text" class="input" name="user_id" placeholder="<?php (!empty($user_data['user_id_err'])) ? print $user_data['user_id_err'] : print ''; ?>" required>
         </div> 

         <div class="inputfield">
            <label>User Type</label>
            <select class="type" id="type" name="user_type" required>
               <option value="agent">Agent</option>
               <option value="direct_landowner">Direct Landowner</option>
               <option value="indirect_landowner">Indirect Landowner</option>
            </select>
         </div>

         <div class="inputfield">
            <label>Address</label>
            <textarea class="textarea" name="address" required></textarea>
         </div>

         <div class="inputfield">
            <label>Contact Number</label>
            <input type="tel" class="input" name="contact_number" placeholder="<?php (!empty($user_data['mobile_number_err'])) ? print $user_data['mobile_number_err'] : print ''; ?>" required>
         </div>
         <div class="inputfield">
            <label>Route number</label>
            <input type="number" class="input" name="route_number" required>
         </div>
         <div class="inputfield">
            <label>Password</label>
            <input type="password" class="input" name="password" required>
         </div>
         <div class="inputfield">
            <label>Confirm Password</label>
            <?php (!empty($user_data['confirm_password_err'])) ? print $user_data['confirm_password_err'] : print ''; ?>
            <input type="password" class="input" name="confirm_password" placeholder="<?php (!empty($user_data['confirm_password_err'])) ? print $user_data['confirm_password_err'] : print ''; ?>" required>
         </div> 
         <div class="inputfield">
            <input type="submit" value="Register" class="btn">
         </div>
      </div>
   </form>




</div> 

</div> 





<?php include '../app/views/admin/bottom-container.php';?>
