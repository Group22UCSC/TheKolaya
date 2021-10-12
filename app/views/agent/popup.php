<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/popup.css">  
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Are You Sure?</h2>
    </div>
    <div class="modal-body">
    <div class="mid-content">
                <label>Landowner ID :-</label>
                <input type="text" class="inputpop" id="lid-pop" name="lid" size="8" readonly>
            </div>  
            <div class="mid-content">
                <label>Initial Tea Weight :-</label>
                <input type="text" class="inputpop" name="weight" id="weight-pop" size="4"readonly>
            </div>        
    </div>
    <div class="modal-footer">      
      <button class="yes" onclick="closeformpopup()">Yes</button>
      <button class="no" onclick="closepopup()">No</button>
      
    </div>
  </div>

</div>
