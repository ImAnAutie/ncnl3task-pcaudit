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
                    User:{$f_first_name} {$f_last_name} ({$fusername})
                </h1>
<div class="row">
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



            </div>
                <hr />
                <h3>Devices {$first_name} has added</h3>
                {include file='listdevices.tpl'}
                <hr>
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

