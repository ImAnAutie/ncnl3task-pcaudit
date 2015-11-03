<?php /* Smarty version 3.1.27, created on 2015-11-03 20:08:59
         compiled from "/home/nitrous/code/www/html/pcaudit/templates/loginform.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21188109635639145bc601a6_69535938%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0454b57e759160b4c3a7970b4d54fd83c106274' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/loginform.tpl',
      1 => 1444723472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21188109635639145bc601a6_69535938',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5639145bc62510_99023918',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5639145bc62510_99023918')) {
function content_5639145bc62510_99023918 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21188109635639145bc601a6_69535938';
?>
<form class="form-horizontal" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">

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
<?php }
}
?>