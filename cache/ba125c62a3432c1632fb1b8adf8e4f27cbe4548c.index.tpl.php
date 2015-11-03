<?php
/*%%SmartyHeaderCode:2060912225561608e95ea4e6_47194715%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba125c62a3432c1632fb1b8adf8e4f27cbe4548c' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/index.tpl',
      1 => 1444238834,
      2 => 'file',
    ),
    '3374a57cd9a4e2483744e69d142a5f99938d94ad' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/config.conf',
      1 => 1444237411,
      2 => 'file',
    ),
    'e65fafd6406d1ec09b026f5a315b17cb97807e78' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/header.tpl',
      1 => 1444261706,
      2 => 'file',
    ),
    '46dab74231e2a7f0b5035be7f86abb21fe25afda' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/footer.tpl',
      1 => 1444238886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2060912225561608e95ea4e6_47194715',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.27',
  'unifunc' => 'content_5616221832aca8_29359229',
  'has_nocache_code' => false,
  'cache_lifetime' => 120,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5616221832aca8_29359229')) {
function content_5616221832aca8_29359229 ($_smarty_tpl) {
?>

<!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> PC Audit</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> </head> <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/pcaudit/">PC Audit</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Floor 1<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                                       <li>
                                <a href="room.php?id=RM101">RM101</a>
                            </li>
                           
                            <li>
                                <a href="addroom.php?id=1">Add Room</a>
                            </li>
                        </ul>
                    </li>
                                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Floor 3<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                                       <li>
                                <a href="room.php?id=RM301">RM301</a>
                            </li>
                           
                            <li>
                                <a href="addroom.php?id=2">Add Room</a>
                            </li>
                        </ul>
                    </li>
                    
</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    </header>
    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to PC Audit
                </h1>
            </div>

        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Gregory Oakley-Stevenson 2015</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body> </html>

<?php }
}
?>