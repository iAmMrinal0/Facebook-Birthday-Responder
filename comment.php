<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<title>Birthday Responder</title>
<link rel="shortcut icon" href="http://img.1mobile.com/market/i/e/4/e4c683ceaf73da99356372019fa88f75.png" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.1.2.js"></script>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({appId: '464995143525912', status: true, cookie: true,
xfbml: true});
};
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
</script>

<script type="text/javascript">
$(document).ready(function(){
$('.share').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
          link: 'http://bdayresponder.herokuapp.com',
          picture: 'http://img.1mobile.com/market/i/e/4/e4c683ceaf73da99356372019fa88f75.png',
          name: 'Birthday Responder',
          caption: 'Hi',
          description: 'Your birthday?too many wall posts? Dont worry. This app lets you reply to all wall posts with a single click.'
});
});
});
</script>
<script>
function sure()
	  {
		var a=document.getElementById('data').value;
		if((a == null) || (a==''))
		{
			alert("the comment box is empty");
			return false;
		}
		else
		{
			return true;
		}
	  }
</script>
</head>
<body>
<?php
//session_start();
set_time_limit(300);
require('./src/facebook.php');

$facebook = new Facebook();

$user=$facebook->getUser();

if($user)
{
$logout=$facebook->getLogoutUrl(array(
'next' => 'http://bdayresponder.herokuapp.com/logout.php'
));
try
{
$user_info=$facebook->api('/me');
?>
<div class='heading'>Welcome to Birthday Responder</div>
<div align="right"><a class="share"><img src="share_button.png" alt="Post To Feed" align="left"/></a>
<br/><div class="rounded" style="background: url(https://graph.facebook.com/<?php echo($user); ?>/picture); display:block; height:51px; width:51px;">
  <img border="0" src="https://graph.facebook.com/<?php echo($user); ?>/picture" />
  </div>
<a href="<?php echo($logout); ?>"><img src="fblogout.png" alt="Logout" name="right" id='right'/></a></div>
<div class='user'>Hi,<?php echo($user_info['name']);?></div><br/>
<?php
}
catch(FacebookApiException $e)
{
error_log($e);
}
?>
<div id='reff'>
<?php
include("ref.php");
?>
</div>
<br/>
<br/>
<div>
<input type="button" class="click" id="clickbutton" value="Click Me"/><div class="fb-like" data-href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" data-send="true" data-layout="button_count" data-width="500" data-show-faces="true" data-colorscheme="dark" data-font="trebuchet ms"></div><br/>
</div>
<div class="box">
<ol type='1'>
<li>Posts which are on your wall posted by others are displayed.</li><br/>
<li>For example:<br/>
<ul type="round">
<li>'a' posts on your wall => Displayed Here.</li><br/>
<li>'a' tags you in a post which is on his/her wall => Not Displayed Here.</li></ul></li><br/>
<li>Displays 20 posts from your wall and refreshes every 60 seconds.</li><br/>
<li>The comments you enter will be posted on all the posts displayed to you.</li><br/>
<li>All the posts will be liked automatically.</li><br/>
<li>Feedback can be posted <a href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" target="_blank">Here</a></li><br/>
<li>None of your data has been saved.So you don't need to worry about privacy.</li><br/>
</ol>
</div>
</body>
</html>
<?php
}
else
{
  header("location:http://bdayresponder.herokuapp.com");
}
?>