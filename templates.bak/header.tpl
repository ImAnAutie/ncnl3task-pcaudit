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

                {if $loginplease eq 'please'}
                  <a href="login.php"><button id="login" name="login" class="btn btn-success">Login</button></a> <a href="signup.php"><button id="signup" name="signup" class="btn btn-success">Signup</button></a>
                {else}
                <a href="logout.php"><button id="logout" name="logout" class="btn btn-success">Logout {$username}</button></a>                 <a href="user.php?id={$userid}"><button id="myuserinfo" name="myuserinfo" class="btn btn-success">My user info</button></a>
                <a href="worksheet.php"><button id="worksheet" name="worksheet" class="btn btn-success">Worksheet</button></a>

                {/if}
                 <ul class="nav navbar-nav navbar-right">
                  {foreach from=$floors item=floor}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{$floor.name}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           {foreach from=$floor.rooms item=room}
                            <li>
                                <a href="room.php?id={$room.id}">{$room.name}</a>
                            </li>
                           {/foreach}

                            <li>
                                <a href="addroom.php?id={$floor.id}">Add Room</a>
                            </li>
                        </ul>
                    </li>
                    {/foreach}

</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <script src="http://autobahn.s3.amazonaws.com/autobahnjs/latest/autobahn.min.jgz"></script>
  <script>
   function onevent(args) {
        console.log("Event:", args[0]);
        var audio = new Audio('notification.mp3');
        audio.play();
        notification=JSON.parse(args[0]);
        title=notification['title'];
        message=notification['message'];
        type=notification['type'];
        sweetAlert(title,message, type);

        swal({
        title: title,
        text: message,
        type: type
        },
        function(){
        console.log("acknowledged message:"+title);
        swal("Acknowledged!", "Acknowledged message.", "success");
        });
        console.log(title,message,type);
    }

var connection = new autobahn.Connection({
         url: 'ws://ubuntu-dev-enviroment-134090.nitrousapp.com:8080/ws',
         realm: 'realm1'
      });

connection.onopen = function (session) {

   session.subscribe('pcaudit.broadcastmessage', onevent);

};

connection.open();
</script>

<script>
  $.get( "getmessage.php", function( data ) {
    notification={};
    notification[0]=data;

    if (data!="NOMSG") {
        onevent(notification);
    }
});
</script>

{literal}
<!-- Hotjar Tracking Code for ubuntu-dev-enviroment-134090.nitrousapp.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:92122,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
{/literal}