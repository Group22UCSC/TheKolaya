<?php include 'topContainer.php';?>
<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/dashboard.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<div class="text">
    <h2>THINGS TO DO</h2>
    </div>
<div class="tables">
  <div class="availablelist">
    <h3 class ="availabletopic">Available Landowner List </h3>
    <table class = "availabletable" id="table">
      <tr>
        <th>Landowner <br> ID</th>
        <th>Container <br>Estimation</th>
      </tr>
      <?php
        for($i=1;$i<4;$i++){
          echo '<tr data-href ="Agent/updateTeaWeight">
                    <td>L00'.$i.'</td>                                    
                    <td>28</td>
                </tr>';                
        }
      ?>
      
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
     
      <?php
        for($i=1;$i<4;$i++){
          echo '<tr data-href ="Agent/confirmDeliverables">
                    <td>L00'.$i.'</td>
                    <td>R'.$i.'</td>
                    <td>Firewood</td>
                    <td>28</td>
                </tr>';                
        }
      ?>
    </table>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded",() => {
    const rows = document.querySelectorAll("tr[data-href]");
    rows.forEach(row =>{
        row.addEventListener("click", ()=>{
            window.location.href = row.dataset.href;
        });
    });
});


// $(document).ready(function(){
//   $(document.table).on("click", "tr[data-href]", function(){
//     window.location.href = this.dataset.href;
//   });
// });

/*
const mytable = document.getElementById("table");

mytable.addEventListener("click", function(e){
  const target = e.target;

  if(target.matches("tr[data-href]")){
    window.location.href=target.dataset.href;
  }
})
*/
</script>
<?php include 'bottomContainer.php';?>