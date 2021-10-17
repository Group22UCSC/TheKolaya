<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/deliverypopup.css">  
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <!-- <form class="popup-content-form" action="<?php echo URL?>agent/updateTeaWeight"  method="POST" onsubmit="clearWeight()"> -->
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Are You Sure?</h2>
    </div>
    <div class="modal-body"> 
            <div class="mid-content">      
                <label>Request ID</label>
                <input type="text" class="inputpop" id="rid-pop" name="rid-popup" size="8" readonly>
            </div>    
             <div class="mid-content">      
                <label>Landowner ID</label>
                <input type="text" class="inputpop" id="lid-pop" name="lid-popup" size="8" readonly>
            </div>  
            <div class="mid-content">
                <label>Request Type</label>
                <input type="text" class="inputpop" id="rtype-pop"  name="rtype-popup" size="8"readonly>
            </div>  
            <div class="mid-content">
                <label>Request Amount</label>
                <input type="text" class="inputpop" id="amount-pop"  name="amount-popup" size="8"readonly>
            </div>  
    </div>
    <div class="modal-footer">         
      <button class="yes" type="submit" onclick="closeformpopup()">Yes</button>
      <button class="no" onclick="closepopup()">No</button>      
    </div>
    <!-- </form>      -->
  </div>

</div>


  
