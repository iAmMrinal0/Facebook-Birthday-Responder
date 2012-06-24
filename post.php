<html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    var auto_refresh = setInterval(
function()
{
$('#reff').fadeOut('slow').load('ref.php').fadeIn("slow");
}, 60000);
  </script>
<div id='fb-root'></div>
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <script> 
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
                      redirectMe(response);
                  } 
				  else
				  {
				  document.location.href="http://fbtest.geekruleploit.com/facebook/logout.php";
				  }
				  
                });
            }
      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'https://facebook.com/mrinal0',
          picture: 'http://highlandsun.com/hyc/LumiKey/P0001885.JPG',
          name: 'Hello World-Mrinal Purohit',
          caption: 'Lets see what can be done here.',
          description: 'Graph api-one of the easiest things to learn.'
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
<div id="reff">
<?php include('ref.php'); ?>
</div>
<br/>
<div class="fb-like" data-href="https://www.facebook.com/pages/Birthday-Responder/423834974322726" data-send="true" data-layout="box_count" data-width="450" data-show-faces="true" data-colorscheme="dark" data-font="verdana"></div>
</html>