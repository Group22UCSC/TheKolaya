
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/teacollection.css">  

      <div class="page" id="teapopup">
        <div class="title">
           Update Tea Weight
        </div>
        <div class="form">
           
            <div class="inputfield">
                <label>Landowner ID</label>
                <input type="text" class="input" id="lid" name="lid" readonly>
            </div>  
            <div class="inputfield">
                <label>Initial Tea Weight</label>
                <input type="text" class="input" name="weight" id="weight" required>
            </div>        
            <div class="inputfield">
            <button class="back" onclick="closeteaform()">Back</button>
            <button class  = "btn" id="myBtn" onclick = "openpopup()"> Add Weight </button>
            <!-- <input type="submit" value="Add Weight" class="btn" id="myBtn"  onclick="openpopup()" >             -->
            </div>
       
        </div>
      </div>	     

      <!-- onclick="openpopup()" -->
