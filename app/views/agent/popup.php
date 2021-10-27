<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/popup.css"> 
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <form class="popup-content-form" action="<?php echo URL?>agent/updateTeaWeight" name = "teaUpdateForm" method="POST" id="form_update" onclick="return validateForm()">
    <div class="modal-header">
      <!-- <span class="close">&times;</span> -->
      <h2>Are You Sure ?</h2>
    </div>
    <div class="modal-body">    
             <div class="mid-content">      
                <label>Landowner ID</label>
                <input type="text" class="inputpop" id="lid-pop" name="lid-popup" size="8" readonly>
            </div>  
            <div class="mid-content">
                <label>Initial Tea Weight</label>
                <input type="text" class="inputpop" name="weight-popup" id="weight-pop" size="8" readonly required>
            </div>   
    </div>
    <div class="modal-footer">         
      <button class="yes" type="submit" id = "yes_submit" onclick="closeformpopup()">Yes</button>
      <button type="button" class="no" onclick="closepopup()">No</button>      
    </div>
    </form>     
  </div>

</div>
<script>
  function validateForm(){
    let x = document.forms["teaUpdateForm"]["weight-popup"].value;
    console.log("ValidateForm");
    if(x==""){
      alert("Weight must be filled out");     
      return false;
    }
    else{
      clearWeight();
      return true;
    }    
  }

  function clearWeight(){   
    document.getElementById("weight").value=" ";
  }

  </script>

  
