<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<title>Birthday Responder</title>
<link rel="shortcut icon" href="http://img.1mobile.com/market/i/e/4/e4c683ceaf73da99356372019fa88f75.png" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});
</script>
<div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <script> 
	window.fbAsyncInit = function() {
               FB.init({ 
                  appId:'235376736580175',
				  cookie:true, 
                  status:true, 
				  xfbml:true, 
				  oauth: true
               });
               FB.getLoginStatus(function(response) {
                  if (response.authResponse) {
                      redirectMe(response);
                  } 
				  else
				  {
				  document.location.href="http://bdayresponder.herokuapp.com/logout.php";
				  }
				  
                });
            }
      function postToFeed() {

        var obj = {
          method: 'feed',
          link: 'http://bdatresponder.herokuapp.com',
          picture: 'http://img.1mobile.com/market/i/e/4/e4c683ceaf73da99356372019fa88f75.png',
          name: 'Birthday Responder',
          caption: 'Hi',
          description: 'Your birthday?too many wall posts? Dont worry. This app lets you reply to all wall posts with a single click.'
        };

        function callback(response) {
          
        }

        FB.ui(obj, callback);
      }
	  
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
<div id="reff">
<?php
<?php
//session_start();
set_time_limit(300);
require('./src/facebook.php');

$facebook = new Facebook(array(
  'appId'  => '235376736580175',
  'secret' => 'c3059cf7554bb4a42ceede7fe509a8f9',
));

$user=$facebook->getUser();

if($user)
{
$logout=$facebook->getLogoutUrl(array(
'next' => 'http://bdayresponder.herokuapp.com/logout.php'
));
try
{
$user_info=$facebook->api('/me');
echo("<div class='heading'>Welcome to Birthday Responder</div><br/>");
echo("<div class='user'>Hi,".$user_info['name']."</div><br/>");
echo("<div class='posts'>");
}
catch(FacebookApiException $e)
{
error_log($e);
}
?>
<?php include('ref.php'); ?>
</div>
<br/>
<a href="<?php echo($logout); ?>"><img src="fblogout.png" alt="Logout"/></a>

	<p><a onclick='postToFeed(); return false;'><img src="fbbutton.png" alt="Post To Feed"/></a></p>
<input type="button" class="click" id="clickbutton" value="Click Me"/><br/>
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
<div class="fb-like" data-href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="verdana"></div>
</body>
</html>