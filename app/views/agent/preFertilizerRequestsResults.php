

<div class="inputfield">
    <label class="resultlbl">Agent ID</label>
    <input type="text" id="lid"  size="6" value="<?php echo $data[0]['agent_id'] ;?>" readonly>
    </div>
  <div class="inputfield">
    <label class="resultlbl">Landowner ID</label>
    <input type="text" id="lid"  size="6" value="<?php echo $data[0]['lid'] ;?>" readonly>
    </div>    
    <div class="inputfield">
    <label class="resultlbl">Request Date</label>
    <input type="date" id="rdate" name="date" value="<?php echo $data[0]['request_date'] ;?>" size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Confirm Date</label>
    <input type="date" id="cdate" name="date" value="<?php echo $data[0]['confirm_date'] ;?>" size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Delivered Date</label>
    <input type="date" id="cdate" name="date"  value="<?php echo $data[0]['date_delivered'] ;?>" size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Request Type</label>
    <input type="text" id="rtype" value="<?php echo $data[0]['request_type'] ;?>"  size="6"  readonly>
    </div>
    <div class="inputfield">
    <label class="resultlbl">Amount</label>
    <input type="text" id="ramount" value="<?php echo $data[0]['amount'] ;?> kg" size="6"  readonly>
</div>
<button id="ok">OK</button>  
