<form class="form-horizontal" method="POST" action="manager_add_user_to_room.php?floorid={$floorid}">
<fieldset> <!-- Form Name --><!-- Select Basic -->

<input type="hidden" id="room_id" name="room_id" value="{$roomid}">
<div class="form-group">
  <label class="col-md-4 control-label" for="userform">Select User</label>
  <div class="col-md-6">
    <select id="userform" name="userform" class="form-control">
{foreach from=$allusers item=user key=userid}
      <option value="{$userid}">{$user.first_name} {$user.last_name}({$user.user_name})</option>
{/foreach}

    </select>
  </div> </div> <!-- Button (Double) --> <div class="form-group">
  <label class="col-md-4 control-label" for="addbuserbtn"></label>
  <div class="col-md-8">
    <button id="addbuserbtn" name="addbuserbtn" class="btn btn-success">Add User</button>
    <button type="reset" id="resetform" name="resetform" class="btn btn-danger">Reset Form</button>
  </div> </div> </fieldset> </form>
