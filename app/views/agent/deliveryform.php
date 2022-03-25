
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/deliveryform.css">  

<div class="page" id="requestpopup">
  <div class="title">
     Confirm Deliverables
  </div>
  <div class="form">
  <form method="POST" id="deliveryUpdateForm">
      <div class="inputfield">
          <label>Request ID</label>
          <input type="text" class="input" name ="rid" id="rid" readonly>
      </div> 

      <div class="inputfield">
                <label>Landowner ID</label>
                <input type="text" class="input" name="lid" id="lid"  readonly>
            </div>        

            <div class="inputfield">
                <label>Request Type</label>
                <input type="text" class="input" name="rtype" id="rtype" readonly>
            </div>        

            <div class="inputfield">
                <label><span>Requested </span>Amount</label>
                <input type="text" class="input" name="amount" id="amount" readonly>
            </div>        
            
      <div class="inputfield" id="btnset">
      <button type="button" class= "btn" id="myBtn"> Confirm </button>
      <button type="button" class="back" onclick="closerequestform()">Back</button> 
      
         
      </div>
</form>
  </div>
</div>	              

