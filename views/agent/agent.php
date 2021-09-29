<?php include 'topContainer.php';?>
<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/dashboard.css"> 
<div class="text">
    <h2>THINGS TO DO</h2>
    </div>
<div class="tables">
  <div class="availablelist">
    <h3 class ="availabletopic">Available Landowner List </h3>
    <table class = "availabletable">
      <tr>
        <th>Landowner <br> ID</th>
        <th>Container <br>Estimation</th>
        
      </tr>
      <tr>
        <td>L001</td>
        <td>10</td>
        
      </tr>
      <tr>
        <td>L002</td>
        <td>20</td>
       
      </tr>
      <tr>
        <td>L003</td>
        <td>4</td>
        
      </tr>
    </table>
  </div>
  <div class="deliverylist">
    <h3 class="deliverytopic">Delivery List </h3>
    <table class="deliverytable">
    <tr>
        <th>Landowner ID</th>
        <th>Request ID</th>
        <th>Type</th>
        <th>Amount</th>
        
      </tr>
      <tr>
        <td>L001</td>
        <td>R10</td>
        <td>Fertilizer</td>
        <td>10</td>
        
      </tr>
      <tr>
        <td>L002</td>
        <td>R20</td>
        <td>Advance</td>
        <td>5000</td>
       
      </tr>
      <tr>
        <td>L003</td>
        <td>R4</td>
        <td>Firewood</td>
        <td>25</td>
        
      </tr>
    </table>
  </div>
</div>

<script src="<?php echo URL?>vendors/js/agent/dashboard.js"></script>
<?php include 'bottomContainer.php';?>