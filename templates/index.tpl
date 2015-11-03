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
                    Welcome to {#appname#}
                </h1>
                {if $loggedin eq '1'}
                  <h3>This is the overview page for {#appname#}</h3>
                  <p>You can at a glance see the status of the audit, and see whitch rooms need more attention.</p>
                {else}
                  <h3>This would be the overview page for {#appname#}</h3>
                  <p>But you need to be logged in.</p>
                {/if}
</div>
{if $loggedin eq '1'}
<div class="row">
        <div class="col-sm-2"><div id="totalbyroom_div">
                <label for = "totalbyroom">Total Devices by room<br />
                <canvas id="totalbyroom" height="100" width="100"></canvas>
                <script>
                var totalbyroomctx = $("#totalbyroom").get(0).getContext("2d");


$.get( "getdevicerooms.php")
  .done(function( data ) {
totalbyroomdata=JSON.parse(data);
  console.log(totalbyroomdata);
		helpers = Chart.helpers;
  var totalbyroomchart = new Chart(totalbyroomctx).Pie(totalbyroomdata, {});
});
</script>
</div></div>

<div class="col-sm-2"><div id="faultsbyroom_div">
                <label for = "faultsbyroom">Faulty Devices by room<br />
                <canvas id="faultsbyroom" height="100" width="100"></canvas>
                <script>
                var faultsbyroomctx = $("#faultsbyroom").get(0).getContext("2d");


$.get( "getfaultyrooms.php")
  .done(function( data ) {
faultsbyroomdata=JSON.parse(data);
  console.log(faultsbyroomdata);
		helpers = Chart.helpers;
{literal}
  var faultsbyroomchart = new Chart(faultsbyroomctx).Pie(faultsbyroomdata, {
  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
{/literal}
});
});
</script>
</div></div>

<div class="col-sm-2"><div id="workingsbyroom_div">
                <label for = "workingsbyroom">Working Devices by room<br />
                <canvas id="workingsbyroom" height="100" width="100"></canvas>
                <script>
                var workingsbyroomctx = $("#workingsbyroom").get(0).getContext("2d");


$.get( "getworkingrooms.php")
  .done(function( data ) {
workingsbyroomdata=JSON.parse(data);
  console.log(workingsbyroomdata);
		helpers = Chart.helpers;
{literal}
  var workingsbyroomchart = new Chart(workingsbyroomctx).Pie(workingsbyroomdata, {
  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
{/literal}
});
});
</script>
</div></div>
</div>


<div class="row">
        <div class="col-sm-2"><div id="faultybytype_div">
                <label for = "faultybytype">Total Devices by Type<br />
                <canvas id="totalbytype" height="100" width="100"></canvas>
                <script>
                var totalbytypectx = $("#totalbytype").get(0).getContext("2d");


$.get( "gettotalbytypes.php")
  .done(function( data ) {
totalbytypedata=JSON.parse(data);
  console.log(totalbytypedata);
		helpers = Chart.helpers;
  var totalbytypechart = new Chart(totalbytypectx).Pie(totalbytypedata, {});
});
</script>
</div></div>
<div class="col-sm-2"><div id="faultybytype_div">
                <label for = "faultybytype">Faulty Devices by Type<br />
                <canvas id="faultybytype" height="100" width="100"></canvas>
                <script>
                var faultybytypectx = $("#faultybytype").get(0).getContext("2d");


$.get( "getfaultytypes.php")
  .done(function( data ) {
faultybytypedata=JSON.parse(data);
  console.log(faultybytypedata);
		helpers = Chart.helpers;
{literal}
  var faultybytypechart = new Chart(faultybytypectx).Pie(faultybytypedata, {
  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
{/literal}
});
});
</script>
</div></div>
        <div class="col-sm-2"><div id="workingbytype_div">
                <label for = "workingbytype">Working Devices by Type<br />
                <canvas id="workingbytype" height="100" width="100"></canvas>
                <script>

                var workingbytypectx = $("#workingbytype").get(0).getContext("2d");
$.get( "getworkingtypes.php")
  .done(function( data ) {
workingbytypedata=JSON.parse(data);
  console.log(workingbytypedata);
		helpers = Chart.helpers;
{literal}
  var workingbytypechart = new Chart(workingbytypectx).Pie(workingbytypedata, {
  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
{/literal}
});
});
</script>
</div></div>
    </div>
{/if}


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

