<?php /* Smarty version 3.1.27, created on 2015-11-03 20:08:57
         compiled from "/home/nitrous/code/www/html/pcaudit/templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:214596897563914592f5219_78222253%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e65fafd6406d1ec09b026f5a315b17cb97807e78' => 
    array (
      0 => '/home/nitrous/code/www/html/pcaudit/templates/header.tpl',
      1 => 1446581330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214596897563914592f5219_78222253',
  'variables' => 
  array (
    'loginplease' => 0,
    'first_name' => 0,
    'last_name' => 0,
    'userid' => 0,
    'floors' => 0,
    'floor' => 0,
    'room' => 0,
    'username' => 0,
    'authkey' => 0,
    'roomid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5639145931a3b1_25198770',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5639145931a3b1_25198770')) {
function content_5639145931a3b1_25198770 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '214596897563914592f5219_78222253';
?>
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

                <?php if ($_smarty_tpl->tpl_vars['loginplease']->value == 'please') {?>
                  <a href="login.php"><button id="login" name="login" class="btn btn-success">Login</button></a> <a href="signup.php"><button id="signup" name="signup" class="btn btn-success">Signup</button></a>
                <?php } else { ?>
                <a href="logout.php"><button id="logout" name="logout" class="btn btn-success">Logout <?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
</button></a>                 <a href="user.php?id=<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
"><button id="myuserinfo" name="myuserinfo" class="btn btn-success">My user info</button></a>
                <a href="worksheet.php"><button id="worksheet" name="worksheet" class="btn btn-primary">Worksheet</button></a>

                <?php }?>
                 <ul class="nav navbar-nav navbar-right">
                  <?php
$_from = $_smarty_tpl->tpl_vars['floors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['floor'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['floor']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['floor']->value) {
$_smarty_tpl->tpl_vars['floor']->_loop = true;
$foreach_floor_Sav = $_smarty_tpl->tpl_vars['floor'];
?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['floor']->value['name'];?>
<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <?php
$_from = $_smarty_tpl->tpl_vars['floor']->value['rooms'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['room'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['room']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['room']->value) {
$_smarty_tpl->tpl_vars['room']->_loop = true;
$foreach_room_Sav = $_smarty_tpl->tpl_vars['room'];
?>
                            <li>
                                <a href="room.php?id=<?php echo $_smarty_tpl->tpl_vars['room']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['room']->value['name'];?>
</a>
                            </li>
                           <?php
$_smarty_tpl->tpl_vars['room'] = $foreach_room_Sav;
}
?>

<!--                            <li>
                                <a href="addroom.php?id=<?php echo $_smarty_tpl->tpl_vars['floor']->value['id'];?>
">Add Room</a>
                            </li> -->
                        </ul>
                    </li>
                    <?php
$_smarty_tpl->tpl_vars['floor'] = $foreach_floor_Sav;
}
?>

</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <?php echo '<script'; ?>
 src="js/handlebars.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="js/sweetalert.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <?php echo '<script'; ?>
 src="http://autobahn.s3.amazonaws.com/autobahnjs/latest/autobahn.min.jgz"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
   function onmessage(notification) {
        console.log("Event:", notification);
        var audio = new Audio('notification.mp3');
        audio.play();
        title=notification['title'];
        message=notification['message'];
        type=notification['type'];

                notification['title']=title;
        notification['username']='<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
';
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
        notification['username']='<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
';
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
<?php echo '</script'; ?>
>


<!-- Hotjar Tracking Code for ubuntu-dev-enviroment-134090.nitrousapp.com -->
<?php echo '<script'; ?>
>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:92122,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
<?php echo '</script'; ?>
>



<?php echo '<script'; ?>
 id="device-listing-template" type="text/x-handlebars-template">
  <tr>
    <td><a href="device.php?id={{id}}">{{hbnumber}}</a></td>
    <td>{{type}}</td>
    <td>{{make}}</td>
    <td>{{comment}}</td>
    <td>{{working}}</td>
    <td><a href="user.php?id={{userid}}">{{username}}</a></td>
    <td><a href="deletedevice.php?id={{id}}&roomid={{roomid}}"><button id="delete" name="delete" class="btn btn-danger">DELETE</button></a></td>
  </tr>
<?php echo '</script'; ?>
>



<?php echo '<script'; ?>
 src="https://cdn.pubnub.com/pubnub-3.7.15.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var pubnub = PUBNUB.init({
    subscribe_key: 'sub-c-2556ee06-7916-11e5-9720-0619f8945a4f',
    publish_key: 'pub-c-c22bf29d-2eba-48c2-84f5-1946ed66539e',
    uuid: '<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
',
    auth_key: '<?php echo $_smarty_tpl->tpl_vars['authkey']->value;?>
'
});


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
    
    if (roomid ==
    <?php if (!empty($_smarty_tpl->tpl_vars['roomid']->value)) {?>
      <?php echo $_smarty_tpl->tpl_vars['roomid']->value;?>

    <?php } else { ?>
      0
    <?php }?>

    ) {
      $( ".devicestable" ).append( html );
      console.log(html);
    }



    },
    error: function (error) {
      // Handle error here
      console.log(JSON.stringify(error));
    }
 });
 
<?php echo '</script'; ?>
>




<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>




<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>

<?php }
}
?>