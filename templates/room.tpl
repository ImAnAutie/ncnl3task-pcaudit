{config_load file='config.conf'}

<!DOCTYPE html> <html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{$title} {#appname#}</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/chart.js"></script>
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
                    Room {$roomname}
                </h1>
<div class="row">
<p>Please note: Any devices added or deleted will change on everyone's phone who is on this page</p>
<p>changed devices and graphs will only appear on other people's phones when the page is refreshed</p>
<p><b>This room should ONLY be done by</p>
<p>PERSON NAME</b></p>
        <div class="col-sm-2">
            <label for = "workingpie"> Devices by status <br />
            <canvas id="workingpie" width="100" height="100"></canvas>
            <script>
                var pieData = [
               {
                  value: {$workingcount.working},
                  label: 'Working',
                  color: 'green'
               },
               {
                  value: {$workingcount.faulty},
                  label: 'Faulty',
                  color: 'red'
               }
            ];

            var context = document.getElementById('workingpie').getContext('2d');
            var workingpiechart = new Chart(context).Pie(pieData);
          </script>
        </div>

        <div class="col-sm-2">
        <div id="devicesbytype_div">
                <label for = "totalbytype">Devices by Type<br />
                <canvas id="totalbytype" height="100" width="100"></canvas>
                <script>
                var totalbytypectx = $("#totalbytype").get(0).getContext("2d");


$.get( "gettotalbytypes.php?roomid={$roomid}")
  .done(function( data ) {
totalbytypedata=JSON.parse(data);
  console.log(totalbytypedata);
		helpers = Chart.helpers;
  var totalbytypechart = new Chart(totalbytypectx).Pie(totalbytypedata, {});
});
</script>
</div>
</div>
<div class="col-sm-2">
<div id="devicesbyuser_div">
                <label for = "totalbyuser">Devices by User<br />
                <canvas id="totalbyuser" height="100" width="100"></canvas>
                <script>
                var totalbyuserctx = $("#totalbyuser").get(0).getContext("2d");


$.get( "getdeviceusers.php?id={$roomid}")
  .done(function( data ) {
totalbyuserdata=JSON.parse(data);
  console.log(totalbyuserdata);
		helpers = Chart.helpers;
  var totalbyuserchart = new Chart(totalbyuserctx).Pie(totalbyuserdata, {});
});
</script>
</div>
</div>

            </div>
                <hr />
                {include file='listdevices.tpl'}
                <hr />
                {include file='adddevice.tpl'}
        </div>
        <!-- /.row -->
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

