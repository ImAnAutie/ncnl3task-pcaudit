<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Add Device to room {$roomname}</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hbnumber">HB Number</label>
  <div class="col-md-4">
  <input id="hbnumber" name="hbnumber" type="text" placeholder="HB Number(EG HB3691)" class="form-control input-md">
  <span class="help-block">Often on the right hand side of PC's</span>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="devicetype">Device Type</label>
  <div class="col-md-4">
    <select id="devicetype" name="devicetype" class="form-control">
      {foreach from=$device_types item=device_type}
            <option value="{$device_type.id}">{$device_type.name}</option>
      {/foreach}

    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="make">Make</label>
  <div class="col-md-4">
    <select id="make" name="make" class="form-control">
      {foreach from=$device_makes item=device_make}
            <option value="{$device_make.id}">{$device_make.name}</option>
      {/foreach}
    </select>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="working">Working?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="working-0">
      <input type="radio" name="working" id="working-0" value="1" checked="checked">
      Yes, no faults.
    </label>
	</div>
  <div class="radio">
    <label for="working-1">
      <input type="radio" name="working" id="working-1" value="0">
      No, There is at least one fault.
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="comment">Comment</label>
  <div class="col-md-4">
  <input id="comment" name="comment" type="text" placeholder="Anything to note about this?" class="form-control input-md">
  <span class="help-block"></span>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submitdevice"></label>
  <div class="col-md-8">
    <button id="submitdevice" name="submitdevice" class="btn btn-success">Submit</button>
    <button type="reset" id="resetform" name="resetform" class="btn btn-danger">Reset Form</button>
  </div>
</div>

</fieldset>
</form>
