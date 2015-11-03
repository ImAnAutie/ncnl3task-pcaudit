{config_load file='config.conf'}

<!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Adding room to:{$floorname} {#appname#}</title>
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
    {include file='header.tpl'}
    </header>
    <!-- Page Content -->
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to {#appname#}
                </h1>
            </div>

<div class="col-lg-6">
<form class="form-horizontal" method="POST">
<fieldset>
<input id="floorid" name="floorid" type="hidden" value="{$floorid}">

<!-- Form Name -->
<legend>Add room to {$floorname}</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="roomname">Room Name</label>
  <div class="col-md-6">
  <input id="roomname" name="roomname" type="text" placeholder="Room Name(EG RM207)" class="form-control input-md">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="addroom"></label>
  <div class="col-md-4">
    <button id="addroom" name="addroom" class="btn btn-success">Add Room</button>
  </div>
</div>

</fieldset>
</form>


</div>



        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        {include file='footer.tpl'}
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

