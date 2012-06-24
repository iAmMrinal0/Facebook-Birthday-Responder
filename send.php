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
	</script>
<?php
	
session_start();

require('./src/facebook.php');

require('batch.php');

$facebook = new Facebook(array(
  'appId'  => '464995143525912',
  'secret' => 'ccc341ce0edbb25731027f56863ce0e5',
));
$user=$facebook->getUser();
if($user)
{
if(isset($_POST['submit']))
{
$batch=new facebook_batch();

$b=$_SESSION['a'];
$msg=array('message' => $_POST['data']);
$c=count($b);
for($i=0;$i<$c;$i++)
{
$a[$i]=$batch->add('/'.$b[$i].'/comments','post',$msg);
}
for($i=0;$i<$c;$i++)
{
$hi[$i]=$batch->add('/'.$b[$i].'/likes','post');
}
$batch->execute();
for($i=0;$i<$c;$i++)
{
$g[$i]=$batch->response($a[$i]);
$h[$i]=$batch->response($hi[$i]);
}
if(isset($g))
{
$_SESSION['success']=1;
header("location:post.php");
}
else
{
$_SESSION['failure']=1;
}
}
}
?>