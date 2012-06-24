<?php
require './src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '464995143525912',
  'secret' => 'ccc341ce0edbb25731027f56863ce0e5',
));

setcookie('fbs_'.$facebook->getAppId(), '', time()-100, '/');
session_destroy();
header('Location:http://fbtest.geekruleploit.com/facebook/index.php');

?>