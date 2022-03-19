
<div class="inputfield">
    <label class="resultlbl">Agent ID</label>
    <input type="text" id="agentid"  size="6" value="<?php echo $data[0]['agent_id'] ;?>" readonly>
    </div>    
  <div class="inputfield">
    <label class="resultlbl">Landowner ID</label>
    <input type="text" id="lid"  size="6" value="<?php echo $data[0]['lid'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Date</label>
    <input type="date" id="date" name="date"  size="6" value="<?php echo $data[0]['date'] ;?>" readonly>
    </div>    
    <div class="inputfield">
    <label class="resultlbl">Initial Weight (Agent)</label>
    <input type="text" id="rtype"  size="6" value="<?php echo $data[0]['initial_weight_agent'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Initial Weight (Supervisor)</label>
    <input type="text" id="rtype"  size="6"  value="<?php echo $data[0]['initial_weight_sup'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Net Weight</label>
    <input type="text" id="ramount"  size="6" value="<?php echo $data[0]['net_weight'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Water Percentage</label>
    <input type="text" id="ramount"  size="6" value="<?php echo $data[0]['water_percentage'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Container Percentage</label>
    <input type="text" id="ramount"  size="6" value="<?php echo $data[0]['container_percentage'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Matured Leaves Percentage</label>
    <input type="text" id="ramount"  size="6" value="<?php echo $data[0]['matured_percentage'] ;?>" readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Quality</label>
    <input type="text" id="ramount"  size="6" value="<?php echo $data[0]['quality'] ;?>" readonly>
    </div> 
    <button id="ok">OK</button>   
  