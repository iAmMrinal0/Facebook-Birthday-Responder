<?php
//session_start();
set_time_limit(300);
require('./src/facebook.php');

$facebook = new Facebook(array(
  'appId'  => '464995143525912',
  'secret' => 'ccc341ce0edbb25731027f56863ce0e5',
));

$user=$facebook->getUser();

if($user)
{
$logout=$facebook->getLogoutUrl(array(
'next' => 'http://fbtest.geekruleploit.com/facebook/logout.php'
));
try
{
$user_profile=$facebook->api('/me/feed?limit=50');
$user_info=$facebook->api('/me');
$t=count($user_profile);
$i=0;
foreach($user_profile as $feed)
{
foreach($feed as $a)
{
$trial=$a;
if(((isset($trial['message'])) /*|| (isset($trial['picture']))*/) && isset($trial['actions']) && isset($trial['comments']))
{
$cnt=$trial['comments'];
if($cnt['count']==0)
{
$b=$trial['to'];
$c=$b['data'];
$d=$c['0'];
if($i<20)
{
if($d['name'] == $user_info['name'])
{
echo($trial['from']['name']."=>");
if(isset($trial['picture']))
{
?>
<img src="<?php echo($trial['picture']); ?>"/>
<?php
}
if(isset($trial['message']))
{
echo($trial['message']."<br/>");
}
$num_id[$i]=$trial['id'];
$i++;
}
}
}
}
}
}
if(isset($num_id))
{
if(is_array($num_id))
{
$_SESSION['a']=$num_id;
?>
<form action="send.php" method="post">
data to post as comment:<input type="text" name="data" id="data"/>
<button type="submit" name='submit' onclick='return sure();'>send</button>
</form>
<?php
}
}
if(isset($_SESSION['success']))
{
echo("posted successfully<br/>");
unset($_SESSION['success']);
}
?>
<a href="photos.php">photos</a><br/>
<a href="<?php echo($logout); ?>">logout</a>

	<p><button onclick='postToFeed(); return false;'>Post to Feed</button></p>
    <p id='msg'></p>
<?php
}
catch(FacebookApiException $e)
{
error_log($e);
}
}
else
{
header("location:http://fbtest.geekruleploit.com/facebook/index.php");
}

?>