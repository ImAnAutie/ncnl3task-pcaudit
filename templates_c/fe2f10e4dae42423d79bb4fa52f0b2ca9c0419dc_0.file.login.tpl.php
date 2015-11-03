<?php /* Smarty version 3.1.27, created on 2015-11-03 20:08:59
         compiled from "/home/nitrous/code/www/html/pcaudit/templates/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6532322835639145bc48d85_83978432%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe2f10e4dae42423d79bb4fa52f0b2ca9c0419dc' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/login.tpl',
      1 => 1444730280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6532322835639145bc48d85_83978432',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5639145bc58c46_10007951',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5639145bc58c46_10007951')) {
function content_5639145bc58c46_10007951 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6532322835639145bc48d85_83978432';
Smarty_Internal_Extension_Config::configLoad($_smarty_tpl, 'config.conf', null, 'local');?>

<!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 <?php echo $_smarty_tpl->getConfigVariable( 'appname');?>
</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php echo '<script'; ?>
 src="js/chart.js"><?php echo '</script'; ?>
>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]--> </head> <body>
    <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </header>
    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Signup to <?php echo $_smarty_tpl->getConfigVariable( 'appname');?>

                </h1>
<div class="row"><?php echo $_smarty_tpl->getSubTemplate ('loginform.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
</div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <!-- /.container -->
    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- Script to Activate the Carousel -->
    <?php echo '<script'; ?>
>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    <?php echo '</script'; ?>
>

</body> </html>

<?php }
}
?>