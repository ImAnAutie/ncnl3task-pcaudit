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
                <a href="logout.php"><button id="logout" name="logout" class="btn btn-success">Logout {$first_name} {$last_name}</button></a>                 <a href="user.php?id={$userid}"><button id="myuserinfo" name="myuserinfo" class="btn btn-success">My user info</button></a>
                <a href="worksheet.php"><button id="worksheet" name="worksheet" class="btn btn-primary">Worksheet</button></a>

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

<!--                            <li>
                                <a href="addroom.php?id={$floor.id}">Add Room</a>
                            </li> -->
                        </ul>
                    </li>
                    {/foreach}

</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <script src="js/handlebars.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <script src="http://autobahn.s3.amazonaws.com/autobahnjs/latest/autobahn.min.jgz"></script>
  <script>
   function onmessage(notification) {
        console.log("Event:", notification);
        var audio = new Audio('notification.mp3');
        audio.play();
        title=notification['title'];
        message=notification['message'];
        type=notification['type'];

                notification['title']=title;
        notification['username']='{$username}';
        notification['ack_type']='acknol-rec';
        pubnub.publish({
               channel: 'broadcastmessage_ack',
               message: notification
               })

        sweetAlert(title,message, type);

        swal({
        title: title,
        text: message,
        type: type
        },
        function(){
        notification['title']=title;
        notification['username']='{$username}';
        notification['ack_type']='acknol-ok';
        pubnub.publish({
               channel: 'broadcastmessage_ack',
               message: notification
               })
        console.log("acknowledged message:"+title);
        swal("Acknowledged!", "Acknowledged message.", "success");
        });
        console.log(title,message,type);
    }
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

{literal}
<script id="device-listing-template" type="text/x-handlebars-template">
  <tr>
    <td><a href="device.php?id={{id}}">{{hbnumber}}</a></td>
    <td>{{type}}</td>
    <td>{{make}}</td>
    <td>{{comment}}</td>
    <td>{{working}}</td>
    <td><a href="user.php?id={{userid}}">{{username}}</a></td>
    <td><a href="deletedevice.php?id={{id}}&roomid={{roomid}}"><button id="delete" name="delete" class="btn btn-danger">DELETE</button></a></td>
  </tr>
</script>
{/literal}


<script src="https://cdn.pubnub.com/pubnub-3.7.15.min.js"></script>
<script>
var pubnub = PUBNUB.init({
    subscribe_key: 'sub-c-2556ee06-7916-11e5-9720-0619f8945a4f',
    publish_key: 'pub-c-c22bf29d-2eba-48c2-84f5-1946ed66539e',
    uuid: '{$username}',
    auth_key: '{$authkey}'
});

{literal}
pubnub.subscribe({
    channel: 'device_add',
    message: function(m){
    console.log(m);
    id=m['id'];
    comment=m['comment']
    hb_number=m['hb_number']
    makename=m['makename']
    roomid=m['roomid']
    typename=m['typename']
    userid=m['userid']
    username=m['username']
    working=m['working']
     var source   = $("#device-listing-template").html();
     var device_listing_template = Handlebars.compile(source);
     var context = {hbnumber: hb_number, id: id,type: typename,make: makename,comment: comment,working: working, userid: userid, username:username, roomid: roomid};
    var html    = device_listing_template(context);
    {/literal}
    if (roomid ==
    {if !empty($roomid)}
      {$roomid}
    {else}
      0
    {/if}

    ) {
      $( ".devicestable" ).append( html );
      console.log(html);
    }
{literal}


    },
    error: function (error) {
      // Handle error here
      console.log(JSON.stringify(error));
    }
 });
 {/literal}
</script>



{literal}
<script>
pubnub.subscribe({
    channel: 'device_delete',
    message: function(m){
      deviceid=m['id'];
      $("#"+deviceid).remove();
    },
    error: function (error) {
      // Handle error here
      console.log(JSON.stringify(error));
    }
 });
</script>
{/literal}


{literal}
<script>
pubnub.subscribe({
    channel: 'broadcastmessage',
    message: function(m){
        if (m['title']) {
          console.log(m);
          onmessage(m);
        } else {
          console.log("Got message with no title via history call:"+JSON.stringify(m));
        }
    },
    error: function (error) {
      // Handle error here
      console.log(JSON.stringify(error));
    }
 });

 pubnub.history({
     channel: 'broadcastmessage',
      callback: function(m){
        if (m[0][0]['title']) {
          console.log(m[0][0]);
          onmessage(m[0][0]);
        } else {
          console.log("Got message with no title via history call:"+JSON.stringify(m[0][0]));
        }

    },
     count: 1, // 100 is the default
     reverse: false // false is the default
 });
</script>
{/literal}
