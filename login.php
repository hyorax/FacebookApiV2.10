<?php



require_once __DIR__ . '/inc/Facebook/autoload.php';

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKExpection;

$_SESSION['FBRLH_state']=$_GET['state'];
$fbPermissions = array('name','email');  
$fb = new Facebook([
  'app_id' => 'app-id', //  your app id
  'app_secret' => 'app-secret', // Your app secret 
  'default_graph_version' => 'v2.10',
  ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions  									
  $loginUrl = $helper->getLoginUrl('http://example.com/fb-callback.php', $permissions);// Your domain url.
  
  echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
  