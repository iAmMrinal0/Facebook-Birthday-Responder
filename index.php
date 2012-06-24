<html>
<head>
<title>Birthday Responder</title>
<script type="text/javascript" src="http://connect.facebook.net/es_ES/all.js"></script>
<script type="text/javascript">
window.fbAsyncInit = function() {
               FB.init({ 
                  appId:'313624692053281',
				  cookie:true, 
                  status:true, 
				  xfbml:true, 
				  oauth: true
               });
               FB.getLoginStatus(function(response) {
                  if (response.authResponse) {
                  document.location.href="http://bdayresponder.herokuapp.com/post.php";
              }
				else
				{
				document.location.href="http://bdayresponder.herokuapp.com/logout.php";
				}			  
                });
            }
</script>
</head>
<body>
<?php

require('./src/facebook.php');
$facebook = new Facebook(array(
  'appId'  => '235376736580175',
  'secret' => 'c3059cf7554bb4a42ceede7fe509a8f9',
));

$user=$facebook->getUser();

if($user)
{
$logout=$facebook->getLogoutUrl();
}
else
{
$login=$facebook->getLoginUrl(array(
'redirect_uri' => 'http://bdayresponder.herokuapp.com/post.php',
'scope' => 'user_birthday,publish_stream,read_stream,user_photos'
)
);
}


if($user)
{
header("location:http://bdayresponder.herokuapp.com/post.php");
}
else
{
?>
<a href="<?php echo($login); ?>">login</a>
<p align="center">
Your birthday?too many wall posts? Don't worry. This app lets you reply to all wall posts with a single click.
Hope you like it.
</p>
<div class="fb-like" data-href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="verdana"></div>
<?php
}
?>
</body>
</html>