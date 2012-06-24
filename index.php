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
                  document.location.href="http://fbtest.geekruleploit.com/facebook/post.php";
              }
				else
				{
				document.location.href="http://fbtest.geekruleploit.com/facebook/logout.php";
				}			  
                });
            }
</script>
<?php

require('./src/facebook.php');
echo("hi");
$facebook = new Facebook(array(
  'appId'  => '464995143525912',
  'secret' => 'ccc341ce0edbb25731027f56863ce0e5',
));

$user=$facebook->getUser();

if($user)
{
$logout=$facebook->getLogoutUrl();
}
else
{
$login=$facebook->getLoginUrl(array(
'redirect_uri' => 'http://fbtest.geekruleploit.com/facebook/photos.php',
'scope' => 'user_birthday,publish_stream,read_stream,user_photos'
)
);
}


if($user)
{
header("location:post.php");
}
else
{
?>
<a href="<?php echo($login); ?>">login</a>
<?php
}
?>