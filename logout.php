<?php
require './src/facebook.php';

$facebook = new Facebook();

setcookie('fbs_'.$facebook->getAppId(), '', time()-100, '/');
session_destroy();
header('Location:http://bdayresponder.herokuapp.com/index.php');

?>