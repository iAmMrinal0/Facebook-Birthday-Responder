<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<title>Birthday Responder</title>
<link rel="shortcut icon" href="http://img.1mobile.com/market/i/e/4/e4c683ceaf73da99356372019fa88f75.png" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://connect.facebook.net/es_ES/all.js"></script>
<script type="text/javascript">
window.fbAsyncInit = function() {
               FB.init({ 
                  appId:'464995143525912',
				  cookie:true, 
                  status:true, 
				  xfbml:true, 
				  oauth: true
               });
               FB.getLoginStatus(function(response) {
                  if (response.authResponse) {
                  document.location.href="http://bdayresponder.herokuapp.com/comment.php";
              }		  
                });
            }
</script>
</head>
<body>
<?php

require('./src/facebook.php');
$facebook = new Facebook();

$user=$facebook->getUser();

if($user)
{
$logout=$facebook->getLogoutUrl();
}
else
{
$login=$facebook->getLoginUrl(array(
'redirect_uri' => 'http://bdayresponder.herokuapp.com/comment.php',
'scope' => 'user_birthday,publish_stream,read_stream'
)
);
}


if($user)
{
header("location:http://bdayresponder.herokuapp.com/comment.php");
}
else
{
?>
<a href="<?php echo($login); ?>"><img src="fblogin.png" alt="Login"/></a>
<p align="center">
Your birthday?too many wall posts? Don't worry. This app lets you reply to all wall posts and like them too with a single click.
Hope you like it.<br/>
Please Provide the necessary permissions so that you could be benefitted from the App.<br/>
No request or message would be sent to anyone without your concern.<img src='kopete020.png' alt=':)'/>
</p>
<div class="fb-like" data-href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="verdana"></div>
<?php
}
?>
</body>
</html>