<?php /* Smarty version 3.1.27, created on 2015-11-03 20:08:57
         compiled from "/home/nitrous/code/www/html/pcaudit/templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:997404460563914592c6c32_53312130%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba125c62a3432c1632fb1b8adf8e4f27cbe4548c' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/index.tpl',
      1 => 1446550869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '997404460563914592c6c32_53312130',
  'variables' => 
  array (
    'title' => 0,
    'loggedin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_563914592eaa55_67831481',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_563914592eaa55_67831481')) {
function content_563914592eaa55_67831481 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '997404460563914592c6c32_53312130';
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
    <?php echo '<script'; ?>
 src="js/chart.js"><?php echo '</script'; ?>
>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    Welcome to <?php echo $_smarty_tpl->getConfigVariable( 'appname');?>

                </h1>
                <?php if ($_smarty_tpl->tpl_vars['loggedin']->value == '1') {?>
                  <h3>This is the overview page for <?php echo $_smarty_tpl->getConfigVariable( 'appname');?>
</h3>
                  <p>You can at a glance see the status of the audit, and see whitch rooms need more attention.</p>
                <?php } else { ?>
                  <h3>This would be the overview page for <?php echo $_smarty_tpl->getConfigVariable( 'appname');?>
</h3>
                  <p>But you need to be logged in.</p>
                <?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['loggedin']->value == '1') {?>
<div class="row">
        <div class="col-sm-2"><div id="totalbyroom_div">
                <label for = "totalbyroom">Total Devices by room<br />
                <canvas id="totalbyroom" height="100" width="100"></canvas>
                <?php echo '<script'; ?>
>
                var totalbyroomctx = $("#totalbyroom").get(0).getContext("2d");


$.get( "getdevicerooms.php")
  .done(function( data ) {
totalbyroomdata=JSON.parse(data);
  console.log(totalbyroomdata);
		helpers = Chart.helpers;
  var totalbyroomchart = new Chart(totalbyroomctx).Pie(totalbyroomdata, {});
});
<?php echo '</script'; ?>
>
</div></div>

<div class="col-sm-2"><div id="faultsbyroom_div">
                <label for = "faultsbyroom">Faulty Devices by room<br />
                <canvas id="faultsbyroom" height="100" width="100"></canvas>
                <?php echo '<script'; ?>
>
                var faultsbyroomctx = $("#faultsbyroom").get(0).getContext("2d");


$.get( "getfaultyrooms.php")
  .done(function( data ) {
faultsbyroomdata=JSON.parse(data);
  console.log(faultsbyroomdata);
		helpers = Chart.helpers;

  var faultsbyroomchart = new Chart(faultsbyroomctx).Pie(faultsbyroomdata, {
  legendTemplate : "<ul class=\"<?php echo '<%'; ?>
=name.toLowerCase()<?php echo '%>'; ?>
-legend\"><?php echo '<%'; ?>
 for (var i=0; i<segments.length; i++){<?php echo '%>'; ?>
<li><span style=\"background-color:<?php echo '<%'; ?>
=segments[i].fillColor<?php echo '%>'; ?>
\"></span><?php echo '<%'; ?>
if(segments[i].label){<?php echo '%>'; ?>
<?php echo '<%'; ?>
=segments[i].label<?php echo '%>'; ?>
<?php echo '<%'; ?>
}<?php echo '%>'; ?>
</li><?php echo '<%'; ?>
}<?php echo '%>'; ?>
</ul>"

});
});
<?php echo '</script'; ?>
>
</div></div>

<div class="col-sm-2"><div id="workingsbyroom_div">
                <label for = "workingsbyroom">Working Devices by room<br />
                <canvas id="workingsbyroom" height="100" width="100"></canvas>
                <?php echo '<script'; ?>
>
                var workingsbyroomctx = $("#workingsbyroom").get(0).getContext("2d");


$.get( "getworkingrooms.php")
  .done(function( data ) {
workingsbyroomdata=JSON.parse(data);
  console.log(workingsbyroomdata);
		helpers = Chart.helpers;

  var workingsbyroomchart = new Chart(workingsbyroomctx).Pie(workingsbyroomdata, {
  legendTemplate : "<ul class=\"<?php echo '<%'; ?>
=name.toLowerCase()<?php echo '%>'; ?>
-legend\"><?php echo '<%'; ?>
 for (var i=0; i<segments.length; i++){<?php echo '%>'; ?>
<li><span style=\"background-color:<?php echo '<%'; ?>
=segments[i].fillColor<?php echo '%>'; ?>
\"></span><?php echo '<%'; ?>
if(segments[i].label){<?php echo '%>'; ?>
<?php echo '<%'; ?>
=segments[i].label<?php echo '%>'; ?>
<?php echo '<%'; ?>
}<?php echo '%>'; ?>
</li><?php echo '<%'; ?>
}<?php echo '%>'; ?>
</ul>"

});
});
<?php echo '</script'; ?>
>
</div></div>
</div>


<div class="row">
        <div class="col-sm-2"><div id="faultybytype_div">
                <label for = "faultybytype">Total Devices by Type<br />
                <canvas id="totalbytype" height="100" width="100"></canvas>
                <?php echo '<script'; ?>
>
                var totalbytypectx = $("#totalbytype").get(0).getContext("2d");


$.get( "gettotalbytypes.php")
  .done(function( data ) {
totalbytypedata=JSON.parse(data);
  console.log(totalbytypedata);
		helpers = Chart.helpers;
  var totalbytypechart = new Chart(totalbytypectx).Pie(totalbytypedata, {});
});
<?php echo '</script'; ?>
>
</div></div>
<div class="col-sm-2"><div id="faultybytype_div">
                <label for = "faultybytype">Faulty Devices by Type<br />
                <canvas id="faultybytype" height="100" width="100"></canvas>
                <?php echo '<script'; ?>
>
                var faultybytypectx = $("#faultybytype").get(0).getContext("2d");


$.get( "getfaultytypes.php")
  .done(function( data ) {
faultybytypedata=JSON.parse(data);
  console.log(faultybytypedata);
		helpers = Chart.helpers;

  var faultybytypechart = new Chart(faultybytypectx).Pie(faultybytypedata, {
  legendTemplate : "<ul class=\"<?php echo '<%'; ?>
=name.toLowerCase()<?php echo '%>'; ?>
-legend\"><?php echo '<%'; ?>
 for (var i=0; i<segments.length; i++){<?php echo '%>'; ?>
<li><span style=\"background-color:<?php echo '<%'; ?>
=segments[i].fillColor<?php echo '%>'; ?>
\"></span><?php echo '<%'; ?>
if(segments[i].label){<?php echo '%>'; ?>
<?php echo '<%'; ?>
=segments[i].label<?php echo '%>'; ?>
<?php echo '<%'; ?>
}<?php echo '%>'; ?>
</li><?php echo '<%'; ?>
}<?php echo '%>'; ?>
</ul>"

});
});
<?php echo '</script'; ?>
>
</div></div>
        <div class="col-sm-2"><div id="workingbytype_div">
                <label for = "workingbytype">Working Devices by Type<br />
                <canvas id="workingbytype" height="100" width="100"></canvas>
                <?php echo '<script'; ?>
>

                var workingbytypectx = $("#workingbytype").get(0).getContext("2d");
$.get( "getworkingtypes.php")
  .done(function( data ) {
workingbytypedata=JSON.parse(data);
  console.log(workingbytypedata);
		helpers = Chart.helpers;

  var workingbytypechart = new Chart(workingbytypectx).Pie(workingbytypedata, {
  legendTemplate : "<ul class=\"<?php echo '<%'; ?>
=name.toLowerCase()<?php echo '%>'; ?>
-legend\"><?php echo '<%'; ?>
 for (var i=0; i<segments.length; i++){<?php echo '%>'; ?>
<li><span style=\"background-color:<?php echo '<%'; ?>
=segments[i].fillColor<?php echo '%>'; ?>
\"></span><?php echo '<%'; ?>
if(segments[i].label){<?php echo '%>'; ?>
<?php echo '<%'; ?>
=segments[i].label<?php echo '%>'; ?>
<?php echo '<%'; ?>
}<?php echo '%>'; ?>
</li><?php echo '<%'; ?>
}<?php echo '%>'; ?>
</ul>"

});
});
<?php echo '</script'; ?>
>
</div></div>
    </div>
<?php }?>


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