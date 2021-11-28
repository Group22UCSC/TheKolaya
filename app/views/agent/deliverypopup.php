<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/deliverypopup.css"> 
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script> 
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <form class="deliverypopup-content-form" action="<?php echo URL?>agent/updateRequest" name = "requestUpdateForm" method="POST" onsubmit="return validateForm()">
    <div class="modal-header">      
      <!-- <span class="close">&times;</span> -->
      <h2>Are You Sure ?</h2>
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
                <label>Amount</label>
                <input type="text" class="inputpop" id="amount-pop"  name="amount-popup" size="8"readonly>
            </div>  
    </div>
    <div class="modal-footer">         
      <button class="yes" type="submit" onclick="closeformpopup()">Yes</button>
      <button type="button" class="no" onclick="closepopup()">No</button>      
    </div>
    </form>     
  </div>

</div>
<script>
  function validateForm(){
    console.log("deliveryvali");
      swal(
				      '<b style="color:green;">Successfully Updated!',
				      '',
			      	'success'
			);
     return true;
     
    }    
  

    

  </script>




  
