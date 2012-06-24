<?php
require './src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '235376736580175',
  'secret' => 'c3059cf7554bb4a42ceede7fe509a8f9',
));

setcookie('fbs_'.$facebook->getAppId(), '', time()-100, '/');
session_destroy();
header('Location:http://bdayresponder.herokuapp.com/index.php');

?>