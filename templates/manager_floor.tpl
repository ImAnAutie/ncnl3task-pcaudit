{debug}
{config_load file='config.conf'}

<!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{$floor_name}-Manager-{#appname#}</title>
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
                    {$floor_name}
                </h1>
                  <h3>From here you can manage {$floor_name}</h3>
                  <p>You can add/delete rooms.</p>
</div>


<hr />
<div class="row">
        <div class="col-sm-8">

        <form class="form-horizontal" method="POST" action="manager_addroom.php">
<fieldset>

<!-- Form Name -->
<legend>Add Room</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="roomname">Room Name</label>
  <div class="col-md-4">
  <input id="room_name" name="room_name" type="text" placeholder="EG: 123" class="form-control input-md" required="">
 <span class="help-block">If it has no number but an actual name put that. EG:"Catering Staff Room"</span>

  </div>
</div>
<!-- hidden floor id -->
  <input id="floor_id" name="floor_id" type="hidden" value="{$floorid}">

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Add Room</button>
    <button id="resetform" name="resetform" type="reset" class="btn btn-danger">Reset Form</button>
  </div>
</div>

</fieldset>
</form

</div>
<hr />



        </div>
</div>

{foreach from=$floor_rooms.rooms item=room key=roomid}
<div id="ROOM_{$roomid}">
<h3><b>{$room.name}</b></h3>

<table style="width:100%">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th></th>
  </tr>

  {foreach from=$room.assigns item=assign key=assignid}
    <tr>
      <td>{$assign.first_name}</td>
      <td>{$assign.last_name}</td>
      <td><a href="manager_assign_delete.php?id={$assignid}"><button id="delete_assign_{$assignid}" name="delete_assign_{$assignid}" class="btn btn-primary">Remove Assignment</button></a></td>
  </tr>
  {/foreach}
</table>


<a href="manager_room.php?id={$roomid}"><button id="manage_room_{$roomid}" name="{$roomid}" class="btn btn-primary">Manage {$room.name}</button></a>

<a href="manager_delete_room.php?id={$roomid}"><button id="delete_room_{$roomid}" name="{$roomid}" class="btn btn-danger">DELETE {$room.name}</button></a>


</div>
<br />
{/foreach}



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

