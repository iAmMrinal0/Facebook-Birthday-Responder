<?php
if($user)
{
try
{
$user_profile=$facebook->api('/me/feed?limit=50');
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
echo($trial['from']['name']." wrote on your wall =>  ");
if(isset($trial['picture']))
{
?>
<img src="<?php echo($trial['picture']); ?>"/>
<?php
}
if(isset($trial['message']))
{
$arent=123;
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
Comment to be posted : <input type="text" name="data" id="data" class="comment-box"/>
<button type="submit" name='submit' onclick='return sure();' required="required">send</button>
</form>
<?php
}
}
if(isset($_SESSION['success']))
{
echo("posted successfully<br/>");
unset($_SESSION['success']);
}
if(!isset($arent))
{
{
echo("No posts to show.<br/>");
}
}
?>
<br/>
<?php
}
catch(FacebookApiException $e)
{
error_log($e);
}
}
else
{
header("location:http://bdayresponder.herokuapp.com/index.php");
}

?>
<meta http-equiv="refresh" content="600" />