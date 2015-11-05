{config_load file='config.conf'}

<!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manager Functions-{#appname#}</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/chart.js"></script>

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
                    {#appname#} Manager Functions
                </h1>
                  <h3>From here you can manage {#appname#}</h3>
                  <p>You can add/remove people to/from rooms and add rooms</p>
<a href="broadcastmessage.php"><button id="broadcastmessage" name="broadcastmessage" class="btn btn-primary">Broadcast Message</button></a>
</div>


<hr />
<div class="row">
        <div class="col-sm-5"><h3>Manage Floors</h3>

        <form class="form-horizontal" method="POST" action="manager_addfloor.php">
<fieldset>

<!-- Form Name -->
<legend>Add Floor</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="floorname">Floor Name</label>
  <div class="col-md-4">
  <input id="floor_name" name="floor_name" type="text" placeholder="EG:Floor 3" class="form-control input-md" required="">

  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Add Floor</button>
    <button id="resetform" name="resetform" type="reset" class="btn btn-danger">Reset Form</button>
  </div>
</div>

</fieldset>
</form>



<h4>*Floors cannot be deleted if they contain rooms.</h4>
{foreach from=$floors item=floor key=floorid}
         <a href="manager_floor.php?id={$floorid}"><button id="manager_floor_rooms" name="manager_floor_rooms" class="btn btn-primary">Manage rooms in floor:{$floor.name}</button></a>
         <a href="manager_delete_floor.php?id={$floorid}"><button id="manager_delete_floor" name="manager_delete_floor" class="btn btn-danger">DELETE {$floor.name}</button></a>
         <p>

         {/foreach}
</div>
<hr />



        </div>
</div>
        <hr>
        <!-- Footer -->
        {include file='footer.tpl'}
    </div>
    <!-- /.container -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body> </html>

