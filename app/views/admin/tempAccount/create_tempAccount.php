<?php include '../app/views/admin/top-container.php'; ?>

<link rel="stylesheet" href="<?php echo URL ?>vendors/css/admin/create_Account.css">


<div class="middle">
   <a>CREATE ACCOUNTS</a>
</div>
<div class="table-container">
   <div class="table-section">
      <table class="teapricetable">
         <tr class="trcls">
            <th class="thcls">User Type</th>
            <th class="thcls">ID</th>
            <th class="thcls">Contact number</th>
         </tr>

         <?php
         $x = count($data);
         for ($i = 0; $i < $x; $i++) {
            echo '<tr class="table-row">
                     <td class="tdcls">' . $data[$i]['user_type'] . '</td>
                     <td class="tdcls">' . $data[$i]['user_id'] . '</td>
                     <td class="tdcls">' . $data[$i]['contact_number'] . '</td>
                  </tr>';
         }
         ?>


      </table>
   </div>


</div>

<style>
   ::placeholder {
      color: red;
   }
</style>

<?php $_SESSION['account_type'] = 'temp' ?>
<div class="k1">
   <div class="wrapper11">
      <div class="title">
         Registration Form
      </div>
      <form action="<?php echo URL ?>admin/create_account" method="POST">
         <div class="form">
            <div class="inputfield" id="user-type">
               <label> User Type</label>
               <input type="text" class="input" name="user_type" required readonly>
            </div>
            <!-- <div class="inputfield" id="landowner-id" style="display: none;">
               <label>Landowner Type</label>
               <select class="type" id="type" name="user_type" required>
                  <option value="direct_landowner">Direct Landowner</option>
                  <option value="indirect_landowner">Indirect Landowner</option>
               </select>
            </div> -->

            <div class="inputfield">
               <label> Name</label>
               <input type="text" class="input" name="name" required>
            </div>

            <div class="inputfield">
               <label>Uesr ID</label>
               <input type="text" class="input" id="user-id" name="user_id" placeholder="<?php (!empty($user_data['user_id_err'])) ? print $user_data['user_id_err'] : print ''; ?>" required readonly>
            </div>

            <div class="inputfield">
               <label>Contact Number</label>
               <input type="tel" class="input" name="contact_number" placeholder="<?php (!empty($user_data['mobile_number_err'])) ? print $user_data['mobile_number_err'] : print ''; ?>" required>
            </div>

            <div class="inputfield" id="route-number" style="display: none;">
               <label>Route number</label>
               <input type="number" class="input" name="route_number">
            </div>

            <div class="inputfield">
               <input type="submit" value="Register" class="btn">
            </div>
         </div>
      </form>




   </div>

</div>

<script src="<?php echo URL ?>vendors/js/admin/create-account.js"></script>



<?php include '../app/views/admin/bottom-container.php'; ?>