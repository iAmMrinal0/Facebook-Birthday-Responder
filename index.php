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
                  document.location.href="http://glowing-journey-8305.herokuapp.com/post.php";
              }
				else
				{
				document.location.href="http://glowing-journey-8305.herokuapp.com/logout.php";
				}			  
                });
            }
</script>
<?php

require('./src/facebook.php');
echo("hi");
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
'redirect_uri' => 'http://glowing-journey-8305.herokuapp.com/post.php',
'scope' => 'user_birthday,publish_stream,read_stream,user_photos'
)
);
}


if($user)
{
header("location:http://glowing-journey-8305.herokuapp.com/post.php");
}
else
{
?>
<a href="<?php echo($login); ?>">login</a>
<?php
}
?>