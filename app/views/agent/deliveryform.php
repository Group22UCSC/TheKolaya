
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/deliveryform.css">  

<div class="page" id="requestpopup">
  <div class="title">
     Confirm Deliverables
  </div>
  <div class="form">
  <form action="#" method="POST" id="deliveryUpdateForm">
      <div class="inputfield">
          <label>Request ID</label>
          <input type="text" class="input" id="rid" readonly>
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
      <button class="back" onclick="closerequestform()">Back</button> 
      <button class  = "btn" id="myBtn"> Confirm </button>
         
      </div>
</form>
  </div>
</div>	              

