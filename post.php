<html>
<head>
<title>Birthday Responder</title>
<style type="text/css">
a
{
color:red;
}
</style>
<html xmlns:fb="http://ogp.me/ns/fb#">
<script type="text/javascript" src="jquery.js"></script>
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
<?php include('ref.php'); ?>
</div>
<br/>
<div>
Displays 20 posts from your wall and refreshes every 60 seconds.Feedback can be posted<a href="https://www.facebook.com/pages/Birthday-Responder/423834974322726"> Here</a>
</div>
<div class="fb-like" data-href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="verdana"></div>
</body>
</html>