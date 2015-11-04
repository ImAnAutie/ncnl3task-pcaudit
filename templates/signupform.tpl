<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Sign up</legend>
  <span class="help-block">{if $error.CREATEFAIL eq 'CREATEFAIL'} Please try again, make sure that the username you entered does not already exists.{/if}</span>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="authcode">Authcode</label>
  <div class="col-md-4">
  <input id="authcode" name="authcode" type="text" placeholder="Authcode" class="form-control input-md" required="">
  <span class="help-block">Please ask gregory for this code.{if $error.EMPTY_AUTHCODE eq 'EMPTY_AUTHCODE'} You need to enter the authcode.{/if}{if $error.INVALID_AUTHCODE eq 'INVALID_AUTHCODE'} That is not the correct authcode.{/if}</span>
  </div>
</div>

<br />

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md">
  <span class="help-block"> {if $error.EMPTY_USERNAME eq 'EMPTY_USERNAME'} You need to enter a username.{/if}</span>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
  <span class="help-block">{if $error.EMPTY_PASSWORD eq 'EMPTY_PASSWORD'} You need to enter a password.{/if}</span>
  </div>
</div>

<br />
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="first_name">First Name</label>
  <div class="col-md-4">
  <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md">
  <span class="help-block">{if $error.EMPTY_FIRST_NAME eq 'EMPTY_FIRST_NAME'} You need to enter a First Name.{/if}</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="last_name">Last Name</label>
  <div class="col-md-4">
  <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md">
  <span class="help-block">{if $error.EMPTY_LAST_NAME eq 'EMPTY_LAST_NAME'} You need to enter a Last Name.{/if}</span>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">
    <button id="login" name="login" class="btn btn-success">Login</button>
    <button id="reset" name="reset" class="btn btn-danger">Reset form</button>
  </div>
</div>

</fieldset>
</form>
